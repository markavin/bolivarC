<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class CLaporanController extends Controller
{
    public function fetchLaporanData($tipeLaporan, $tanggalAwal, $tanggalAkhir, $NamaPelanggan)
    {
        // Cek tipe laporan yang dipilih
        if ($tipeLaporan == 'penukaran') {
            $laporan = DB::table('penukaran')
                ->join('pelanggan', 'penukaran.id_pelanggan', '=', 'pelanggan.id')
                ->join('menu', 'penukaran.id_menu', '=', 'menu.id')
                ->join('poin', 'penukaran.id_penukaran', '=', 'poin.id_penukaran')
                ->select(
                    'penukaran.id_penukaran',
                    DB::raw('DATE(penukaran.tanggal_penukaran) as tanggalPenukaran'),
                    'pelanggan.NamaPelanggan',
                    'menu.namaMenu',
                    'penukaran.total_penukaranPoin as totalPoin',
                    'pelanggan.totalPoin as sisaPoin',
                    'poin.status'
                )
                ->when($tanggalAwal && $tanggalAkhir, function ($query) use ($tanggalAwal, $tanggalAkhir) {
                    return $query->whereBetween(DB::raw('DATE(penukaran.tanggal_penukaran)'), [$tanggalAwal, $tanggalAkhir]);
                })
                ->when($NamaPelanggan, function ($query, $NamaPelanggan) {
                    return $query->where('pelanggan.NamaPelanggan', 'LIKE', "%$NamaPelanggan%");
                })
                ->orderBy('penukaran.tanggal_penukaran', 'DESC')
                ->get();

            $totalTransaksi = $laporan->count(); // Total transaksi penukaran
        } else if ($tipeLaporan == 'penjualan') {
            $laporan = DB::table('penjualan')
                ->leftJoin('pelanggan', 'penjualan.id_pelanggan', '=', 'pelanggan.id')
                ->join('detail_penjualan', 'penjualan.id_penjualan', '=', 'detail_penjualan.id_penjualan')
                ->join('menu', 'detail_penjualan.id_menu', '=', 'menu.id')
                ->select(
                    'penjualan.id_penjualan',
                    DB::raw('DATE(penjualan.tanggalPenjualan) as tanggalPenjualan'),
                    DB::raw('COALESCE(pelanggan.NamaPelanggan, "Guest") as NamaPelanggan'),
                    DB::raw('GROUP_CONCAT(menu.namaMenu SEPARATOR ", ") as namaMenu'),
                    'penjualan.totalHarga',
                    DB::raw('SUM(detail_penjualan.quantity) as totalQuantity')
                )
                ->when($tanggalAwal && $tanggalAkhir, function ($query) use ($tanggalAwal, $tanggalAkhir) {
                    return $query->whereBetween(DB::raw('DATE(penjualan.tanggalPenjualan)'), [$tanggalAwal, $tanggalAkhir]);
                })
                ->groupBy('penjualan.id_penjualan', 'penjualan.tanggalPenjualan', 'pelanggan.NamaPelanggan', 'pelanggan.totalPoin', 'penjualan.totalHarga')
                ->orderBy('penjualan.tanggalPenjualan', 'DESC')
                ->get();

            $totalTransaksi = $laporan->sum('totalHarga');
        } else {
            $laporan = DB::table('pembelian')
                ->join('detail_pembelian', 'pembelian.id_pembelian', '=', 'detail_pembelian.id_pembelian')
                ->join('bahanBaku', 'detail_pembelian.id_bahanBaku', '=', 'bahanBaku.id')
                ->select(
                    'pembelian.id_pembelian',
                    'bahanBaku.namaBahanBaku',
                    DB::raw('DATE(pembelian.tanggalPembelian) as purchase_date'),
                    'pembelian.totalHarga as total_price',
                    DB::raw('SUM(detail_pembelian.quantity) as toquantity')
                )
                ->when($tanggalAwal && $tanggalAkhir, function ($query) use ($tanggalAwal, $tanggalAkhir) {
                    return $query->whereBetween(DB::raw('DATE(pembelian.tanggalPembelian)'), [$tanggalAwal, $tanggalAkhir]);
                })
                ->groupBy('pembelian.id_pembelian', 'bahanBaku.namaBahanBaku', 'pembelian.tanggalPembelian', 'pembelian.totalHarga')
                ->orderBy('pembelian.tanggalPembelian', 'DESC')
                ->get();

            $totalTransaksi = $laporan->sum('total_price');
        }

        return ['laporan' => $laporan, 'totalTransaksi' => $totalTransaksi];
    }

    public function getLaporan(Request $request)
    {
        $tipeLaporan = $request->get('tipe', 'penjualan');
        $tanggalAwal = $request->get('tanggal_awal');
        $tanggalAkhir = $request->get('tanggal_akhir');
        $NamaPelanggan = $request->get('nama_pelanggan');

        $daftarPelanggan = [];
        if ($tipeLaporan == 'penukaran') {
            $daftarPelanggan = DB::table('pelanggan')->pluck('NamaPelanggan', 'id');
        }

        $dataLaporan = $this->fetchLaporanData($tipeLaporan, $tanggalAwal, $tanggalAkhir, $NamaPelanggan);

        return view('dashboard.laporan.laporan', array_merge($dataLaporan, [
            'tipeLaporan' => $tipeLaporan,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'NamaPelanggan' => $NamaPelanggan,
            'daftarPelanggan' => $daftarPelanggan,
        ]));
    }

    public function exportExcel(Request $request)
    {
        $tipeLaporan = $request->get('tipe', 'penjualan');
        $tanggalAwal = $request->get('tanggal_awal');
        $tanggalAkhir = $request->get('tanggal_akhir');
        $NamaPelanggan = $request->get('nama_pelanggan');

        $dataLaporan = $this->fetchLaporanData($tipeLaporan, $tanggalAwal, $tanggalAkhir, $NamaPelanggan);

        if ($dataLaporan['laporan']->isEmpty()) {
            return back()->with('error', 'No data available for the selected filters.');
        }

        $fileName = "{$tipeLaporan}_report_{$tanggalAwal}_to_{$tanggalAkhir}.xlsx";

        return Excel::download(
            new LaporanExport($dataLaporan['laporan'], $tipeLaporan, $tanggalAwal, $tanggalAkhir, $NamaPelanggan),
            $fileName
        );
    }

    public function exportPDF(Request $request)
    {
        $tipeLaporan = $request->get('tipe', 'penjualan');
        $tanggalAwal = $request->get('tanggal_awal');
        $tanggalAkhir = $request->get('tanggal_akhir');
        $NamaPelanggan = $request->get('nama_pelanggan');
        // Ambil data laporan sesuai dengan filter
        $dataLaporan = $this->fetchLaporanData($tipeLaporan, $tanggalAwal, $tanggalAkhir, $NamaPelanggan);

        // Validasi jika data kosong
        if ($dataLaporan['laporan']->isEmpty()) {
            return back()->with('error', 'No data available for the selected filters.');
        }
        
        if($tipeLaporan == 'penukaran'){
            $fileName = "Redemptions_report_{$tanggalAwal}_to_{$tanggalAkhir}.pdf";
        }
        elseif($tipeLaporan == 'penjualan'){
            $fileName = "Sales_report_{$tanggalAwal}_to_{$tanggalAkhir}.pdf";
        }
        else{
            $fileName = "Purchase_report_{$tanggalAwal}_to_{$tanggalAkhir}.pdf";
        }
        
        $totalTransaksi = $dataLaporan['totalTransaksi'];
        
        $pdf = FacadePdf::loadView('dashboard.laporan.pdf', [
            'laporan' => $dataLaporan['laporan'],
            'tipeLaporan' => $tipeLaporan,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'NamaPelanggan' => $NamaPelanggan,
            'totalTransaksi' => $totalTransaksi,
        ]);

        return $pdf->download($fileName);
    }
}
