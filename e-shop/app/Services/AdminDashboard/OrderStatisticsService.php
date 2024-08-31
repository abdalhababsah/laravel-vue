<?php
namespace App\Services\AdminDashboard;
use App\Services;
use App\Models\Order;
use Carbon\Carbon;

class OrderStatisticsService
{
    public function getTotalSales(): float
    {
        return Order::sum('total_price');
    }

    public function getSalesPercentageChange(): float
    {
        $lastMonthSales = Order::where('created_at', '>=', Carbon::now()->subMonth())->sum('total_price');
        $totalSales = $this->getTotalSales();

        return ($totalSales > 0) ? ($lastMonthSales / $totalSales) * 100 : 0;
    }

    public function getActiveOrderCount(): int
    {
        return Order::where('status', 'active')->count();
    }

    public function getWeeklyOrderPercentageChange(): float
    {
        $currentWeekOrders = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $previousWeekOrders = Order::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->count();

        if ($previousWeekOrders > 0) {
            return (($currentWeekOrders - $previousWeekOrders) / $previousWeekOrders) * 100;
        }

        return $currentWeekOrders > 0 ? 100 : 0; // If there were no orders last week, return 100% change if there are orders this week, otherwise 0%
    }

        // Returns daily sales data for the past week
        public function getDailySalesForWeek()
        {
            return Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total_sales')
                        ->groupBy('date')
                        ->orderBy('date', 'asc')
                        ->where('created_at', '>=', Carbon::now()->subWeek())
                        ->get();
        }

        // Returns daily orders count for the past week
        public function getDailyOrdersForWeek()
        {
            return Order::selectRaw('DATE(created_at) as date, COUNT(*) as total_orders')
                        ->groupBy('date')
                        ->orderBy('date', 'asc')
                        ->where('created_at', '>=', Carbon::now()->subWeek())
                        ->get();
        }
}
