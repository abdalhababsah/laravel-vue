<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index(){
        $user_id=Auth::user()->id;
        $orders = Order::where("user_id", $user_id)->with(['user', 'userAddress', 'orderItems.product', 'payments'])
        ->latest()
        ->paginate(10);
        return Inertia::render('User/Dashboard/Orders',['orders'=>$orders]);
    }
}
