<?php

namespace App\Services\AdminDashboard;
use App\Services;
use App\Models\Product;

class ProductStatisticsService
{
    public function getProductCount(): int
    {
        return Product::count();
    }

    public function getProductsAddedToday(): int
    {
        return Product::whereDate('created_at', today())->count();
    }
}
