<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $laporan;
    protected $tipeLaporan;

    public function __construct($laporan, $tipeLaporan)
    {
        $this->laporan = $laporan;
        $this->tipeLaporan = $tipeLaporan;
    }

    public function collection()
    {
        if ($this->tipeLaporan === 'penjualan') {
            return collect($this->laporan)->map(function ($item) {
                return [
                    'ID Penjualan' => $item->id_penjualan,
                    'Tanggal Penjualan' => $item->tanggalPenjualan,
                    'Nama Pelanggan' => $item->NamaPelanggan,
                    'Nama Menu' => $item->namaMenu,
                    'Total Quantity' => $item->totalQuantity,
                    'Total Harga' => $item->totalHarga,
                ];
            });
        } else {
            return collect($this->laporan)->map(function ($item) {
                return [
                    'ID Pembelian' => $item->id_pembelian,
                    'Tanggal Pembelian' => $item->purchase_date,
                    'Nama Bahan Baku' => $item->namaBahanBaku,
                    'Total Quantity' => $item->toquantity,
                    'Total Harga' => $item->total_price,
                ];
            });
        }
    }

    public function headings(): array
    {
        if ($this->tipeLaporan === 'penjualan') {
            return [
                'ID Penjualan',
                'Tanggal Penjualan',
                'Nama Pelanggan',
                'Nama Menu',
                'Total Quantity',
                'Total Harga',
            ];
        } else {
            return [
                'ID Pembelian',
                'Tanggal Pembelian',
                'Nama Bahan Baku',
                'Total Quantity',
                'Total Harga',
            ];
        }
    }
}
