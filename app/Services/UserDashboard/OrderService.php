<?php
namespace App\Services\UserDashboard;
use App\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderService
{
    public function getOrderStats()
    {
        $userId = Auth::id();

        // Total Orders
        $totalOrders = Order::where('user_id', $userId)->count();

        // Pending Orders
        $pendingOrders = Order::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();

        // Completed Orders
        $completedOrders = Order::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        return [
            'total_orders' => $totalOrders,
            'pending_orders' => $pendingOrders,
            'completed_orders' => $completedOrders,
        ];
    }
}
