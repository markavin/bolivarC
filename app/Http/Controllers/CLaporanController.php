<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class CLaporanController extends Controller
{
    public function fetchLaporanData($tipeLaporan, $tanggalAwal, $tanggalAkhir)
    {
        if ($tipeLaporan == 'penjualan') {
            $laporan = DB::table('penjualan')
                ->join('pelanggan', 'penjualan.id_pelanggan', '=', 'pelanggan.id')
                ->join('detail_penjualan', 'penjualan.id_penjualan', '=', 'detail_penjualan.id_penjualan')
                ->join('menu', 'detail_penjualan.id_menu', '=', 'menu.id')
                ->select(
                    'penjualan.id_penjualan',
                    DB::raw('DATE(penjualan.tanggalPenjualan) as tanggalPenjualan'),
                    'pelanggan.NamaPelanggan',
                    DB::raw('GROUP_CONCAT(menu.namaMenu SEPARATOR ", ") as namaMenu'),
                    'penjualan.totalHarga',
                    DB::raw('SUM(detail_penjualan.quantity) as totalQuantity')
                )
                ->when($tanggalAwal && $tanggalAkhir, function ($query) use ($tanggalAwal, $tanggalAkhir) {
                    return $query->whereBetween('penjualan.tanggalPenjualan', [$tanggalAwal, $tanggalAkhir]);
                })
                ->groupBy('penjualan.id_penjualan', 'penjualan.tanggalPenjualan', 'pelanggan.NamaPelanggan', 'penjualan.totalHarga')
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
                    return $query->whereBetween('pembelian.tanggalPembelian', [$tanggalAwal, $tanggalAkhir]);
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
        $dataLaporan = $this->fetchLaporanData($tipeLaporan, $tanggalAwal, $tanggalAkhir);

        return view('dashboard/laporan/laporan', array_merge($dataLaporan, [
            'tipeLaporan' => $tipeLaporan,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir
        ]));
    }

    public function exportExcel(Request $request)
    {
        $tipeLaporan = $request->get('tipe', 'penjualan'); 
        $tanggalAwal = $request->get('tanggal_awal');
        $tanggalAkhir = $request->get('tanggal_akhir');
        $dataLaporan = $this->fetchLaporanData($tipeLaporan, $tanggalAwal, $tanggalAkhir);
        $laporanCollection = collect($dataLaporan['laporan']);

        return Excel::download(new LaporanExport($laporanCollection, $tipeLaporan), 'laporan.xlsx');
    }
}
