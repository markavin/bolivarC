<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengatur nilai activeMenu untuk menu home
        $activeMenu = 'overview';
        
        // Data dashboard
        $data = [
            'totalRevenue' => 'Rp 1,000,000,000.00',
            'totalSalesTransactions' => '108,000',
            'totalCustomers' => '125',
            'topSelling' => [
                'el Fuerte', 'el Palmar', 'Caramel Macchiato', 'Peanut Butter Latte', 
                'Americano', 'Cafe Latte', 'Red Velvet', 'Chocolate Cheese', 'Blueberry Cheese'
            ],
            'salesData' => [
                ['label' => 'Jan', 'value' => 10000],
                ['label' => 'Feb', 'value' => 20000],
                ['label' => 'Mar', 'value' => 30000],
                ['label' => 'Apr', 'value' => 40000],
                ['label' => 'May', 'value' => 50000],
                ['label' => 'Jun', 'value' => 60000],
            ]
        ];

        return view('overview.index', compact('data', 'activeMenu'));
    }

}
