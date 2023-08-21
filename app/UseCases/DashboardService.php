<?php


namespace App\UseCases;

use App\Handlers\DashboardHandler;

class DashboardService
{
    public function getDashboardData(): array
    {
        return (new DashboardHandler())->handle();
    }
}
