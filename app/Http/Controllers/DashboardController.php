<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $totalRevenue = Penjualan::sum('totalHarga');
        $totalSalesTransactions = Penjualan::count();
        $totalExpenses = Pembelian::sum('totalHarga');
        $topSelling = DB::table('detail_penjualan')
            ->join('menu', 'detail_penjualan.id_menu', '=', 'menu.id')
            ->select('menu.namaMenu', DB::raw('SUM(detail_penjualan.quantity) as total_quantity'))
            ->groupBy('menu.namaMenu')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();
        $latestSalesTransactions = Penjualan::orderBy('created_at', 'desc')->limit(5)->get();
        $latestCustomers = Pelanggan::orderBy('created_at', 'desc')->limit(5)->get();
        $latestPurchaseTransactions = Pembelian::orderBy('created_at', 'desc')->limit(5)->get();
        $latestStock = BahanBaku::orderBy('created_at', 'desc')->limit(5)->get();

        $availableYears = $this->getAvailableYears();

        return view('dashboard.overview', compact(
            'totalRevenue',
            'totalSalesTransactions',
            'totalExpenses',
            'topSelling',
            'latestSalesTransactions',
            'latestCustomers',
            'availableYears',
            'latestPurchaseTransactions',
            'latestStock'
        ));
    }


    private function getAvailableYears()
    {
        return Penjualan::select(DB::raw('YEAR(tanggalPenjualan) as year'))
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('year');
    }
    private function getOverviewData($period, $year = null)
    {
        switch ($period) {
            case 'week':
                return collect(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])->map(function ($day) {
                    $date = Carbon::now()->startOfWeek()->addDays(array_search($day, ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']));
                    return [
                        'label' => $day,
                        'total_sales' => Penjualan::whereDate('tanggalPenjualan', $date)->sum('totalHarga')
                    ];
                });

            case 'month':
                return collect(range(1, 4))->map(function ($week) {
                    $weekStart = Carbon::now()->startOfMonth()->addWeeks($week - 1);
                    $weekEnd = $weekStart->copy()->endOfWeek();

                    return [
                        'label' => "Week $week",
                        'total_sales' => Penjualan::whereBetween('tanggalPenjualan', [$weekStart, $weekEnd])->sum('totalHarga')
                    ];
                });

            case 'year':
                return collect(range(1, 12))->map(function ($month) use ($year) {
                    return [
                        'label' => Carbon::create()->month($month)->format('F'),
                        'total_sales' => Penjualan::whereYear('tanggalPenjualan', $year)->whereMonth('tanggalPenjualan', $month)->sum('totalHarga')
                    ];
                });

            default:
                return Penjualan::select(
                    DB::raw("DATE(tanggalPenjualan) as label"),
                    DB::raw("SUM(totalHarga) as total_sales")
                )
                    ->whereBetween('tanggalPenjualan', [Carbon::now()->subMonth(), Carbon::now()])
                    ->groupBy('label')
                    ->orderBy('label', 'asc')
                    ->get();
        }
    }

    public function getDashboardData(Request $request)
    {
        $period = $request->input('period', 'month');
        $year = $request->input('year', null);
        $overviewData = $this->getOverviewData($period, $year);

        $labels = $overviewData->pluck('label');
        $sales = $overviewData->pluck('total_sales');

        return response()->json([
            'labels' => $labels,
            'sales' => $sales,
        ]);
    }
};
