<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Log;


class LaporanExport implements FromCollection, WithHeadings
{
    protected $laporan;
    protected $tipeLaporan;
    protected $tanggalAwal;
    protected $tanggalAkhir;
    protected $NamaPelanggan;

    public function __construct($laporan, $tipeLaporan, $tanggalAwal, $tanggalAkhir, $NamaPelanggan)
    {
        $this->laporan = $laporan;
        $this->tipeLaporan = $tipeLaporan;
        $this->tanggalAwal = $tanggalAwal ? date('d-m-Y', strtotime($tanggalAwal)) : 'All Dates';
        $this->tanggalAkhir = $tanggalAkhir ? date('d-m-Y', strtotime($tanggalAkhir)) : '';
        $this->NamaPelanggan = $NamaPelanggan ?: 'All Customers';
    }
    


    public function collection()
    {
        return collect($this->laporan)->map(function ($item) {
            if ($this->tipeLaporan === 'penukaran') {
                return [
                    'ID Penukaran' => $item->id_penukaran,
                    'Tanggal Penukaran' => $item->tanggalPenukaran,
                    'Nama Pelanggan' => $item->NamaPelanggan,
                    'Nama Menu' => $item->namaMenu,
                    'Total Poin' => $item->totalPoin,
                    'Status' => $item->status,
                    'Sisa Poin' => $item->sisaPoin,
                ];
            } elseif ($this->tipeLaporan === 'penjualan') {
                return [
                    'ID Penjualan' => $item->id_penjualan,
                    'Tanggal Penjualan' => $item->tanggalPenjualan,
                    'Nama Pelanggan' => $item->NamaPelanggan,
                    'Nama Menu' => $item->namaMenu,
                    'Total Quantity' => $item->totalQuantity,
                    'Total Harga' => $item->totalHarga,
                ];
            } else {
                return [
                    'ID Pembelian' => $item->id_pembelian,
                    'Tanggal Pembelian' => $item->purchase_date,
                    'Nama Bahan Baku' => $item->namaBahanBaku,
                    'Total Quantity' => $item->toquantity,
                    'Total Harga' => $item->total_price,
                ];
            }
        });
    }


    public function headings(): array
    {
        if ($this->tipeLaporan === 'penukaran') {
            return [
                'ID Penukaran',
                'Tanggal Penukaran',
                'Nama Pelanggan',
                'Nama Menu',
                'Total Poin',
                'Status',
                'Sisa Poin',
            ];
        } elseif ($this->tipeLaporan === 'penjualan') {
            return [
                'ID Sales',
                'Date',
                'Customer Name',
                'Menu Name',
                'Total Quantity',
                'Total Price',
            ];
        } else {
            return [
                'ID Purchase',
                'Date',
                'Stock Name',
                'Total Quantity',
                'Total Price',
            ];
        }
    }
    
}
