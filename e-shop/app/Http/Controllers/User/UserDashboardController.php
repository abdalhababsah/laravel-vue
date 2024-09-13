<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserDashboard\OrderService;
use App\Services\UserDashboard\ProductService;
use Inertia\Inertia;

class UserDashboardController extends Controller
{
    protected $orderService;
    protected $productService;

    public function __construct(OrderService $orderService, ProductService $productService)
    {
        $this->orderService = $orderService;
        $this->productService = $productService;
    }

    public function index()
    {
        $orderStats = $this->orderService->getOrderStats();
        $productsAdded = $this->productService->getProductsAddedInLast30Days();

        return Inertia::render('User/Dashboard/Index', [
            'orderStats' => $orderStats,
            'productsAdded' => $productsAdded,
        ]);
    }
}
