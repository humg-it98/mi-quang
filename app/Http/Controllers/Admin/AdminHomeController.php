<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index()
    {
        $totalProducts  = DB::table('product')->select('id')->count();
        $totalUsers     = DB::table('users')->select('id')->count();
        $totalPosts     = DB::table('post')->select('id')->count();
        $totalOrders     = Order::with('customer')->orderBy('id', 'ASC')->count();
        $booking = Booking::orderBy('id', 'desc')->get();
        $viewData = [
            'listProducts'   => $totalProducts,
            'listUsers'     => $totalUsers,
            'listPosts'     => $totalPosts,
            'listOrders'   => $totalOrders,
            'booking' => $booking,
        ];
        return view('admin.index', $viewData);
    }
}
