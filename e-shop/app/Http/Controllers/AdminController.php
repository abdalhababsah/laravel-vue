<?php
namespace App\Http\Controllers;

use App\Services\AdminDashboard\UserStatisticsService;
use App\Services\AdminDashboard\ProductStatisticsService;
use App\Services\AdminDashboard\OrderStatisticsService;
use Inertia\Inertia;

class AdminController extends Controller
{
    protected $userStatisticsService;
    protected $productStatisticsService;
    protected $orderStatisticsService;

    public function __construct(
        UserStatisticsService $userStatisticsService,
        ProductStatisticsService $productStatisticsService,
        OrderStatisticsService $orderStatisticsService
    ) {
        $this->userStatisticsService = $userStatisticsService;
        $this->productStatisticsService = $productStatisticsService;
        $this->orderStatisticsService = $orderStatisticsService;
    }

    public function index()
    {
        return Inertia::render('Admin/Dashboard', [
            'UsersCount' => $this->userStatisticsService->getUserCount(), // Returns the total number of users
            'UserPercentageChange' => $this->userStatisticsService->getUserPercentageChange(), // Returns the percentage change in user count since last week
            'ProductCount' => $this->productStatisticsService->getProductCount(), // Returns the total number of products
            'ProductsAddedToday' => $this->productStatisticsService->getProductsAddedToday(), // Returns the number of products added today
            'TotalSales' => $this->orderStatisticsService->getTotalSales(), // Returns the total sales amount
            'SalesPercentageChange' => $this->orderStatisticsService->getSalesPercentageChange(), // Returns the percentage change in sales since last month
            'ActiveOrderCount' => $this->orderStatisticsService->getActiveOrderCount(), // Returns the number of active orders
            'WeeklyOrderPercentageChange' => $this->orderStatisticsService->getWeeklyOrderPercentageChange(), // Returns the percentage change in orders from this week compared to the previous week
            'DailySales' => $this->orderStatisticsService->getDailySalesForWeek(), // Returns daily sales data
            'DailyOrders' => $this->orderStatisticsService->getDailyOrdersForWeek(), // Returns daily orders data

        ]);
    }
}
