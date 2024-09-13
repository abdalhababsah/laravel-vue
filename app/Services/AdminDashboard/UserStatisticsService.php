<?php

namespace App\Services\AdminDashboard;
use App\Services;
use App\Models\User;
use Carbon\Carbon;

class UserStatisticsService
{
    public function getUserCount(): int
    {
        return User::count();
    }

    public function getUserPercentageChange(): float
    {
        $lastWeekUsers = User::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $totalUsers = $this->getUserCount();

        return ($totalUsers > 0) ? ($lastWeekUsers / $totalUsers) * 100 : 0;
    }
}
