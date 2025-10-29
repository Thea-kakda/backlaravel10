<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'orders' => 10293,
            'sales' => 89000,
            'pending' => 2040,
        ];

        $deals = [
            ['product' => 'Apple Watch', 'location' => '6066 Marjolaine Landing', 'time' => '12.09.2019 - 12:53 PM', 'pieces' => 423, 'amount' => 34295, 'status' => 'Delivered'],
            // Add more...
        ];

        return view('admin.dashboard', compact('stats', 'deals'));
    }
}
