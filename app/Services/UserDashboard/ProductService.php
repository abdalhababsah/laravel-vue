<?php
namespace App\Services\UserDashboard;
use App\Services;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductService
{
    public function getProductsAddedInLast30Days()
    {
        $startDate = Carbon::now()->subDays(30);

        $count = DB::table('products')
            ->where('created_at', '>=', $startDate)
            ->count();

        return $count;
    }
}
