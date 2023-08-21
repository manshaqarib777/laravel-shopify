<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserOrder;
use App\Models\UserTicket;
use App\UseCases\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    private $service;

    public function __construct(DashboardService $service)
    {
        // $this->middleware('backend');
        $this->service = $service;
    }

    public function showDashboard()
    {
        extract($this->service->getDashboardData());
        $userOrders = UserOrder::whereHas('product')->with('product')->groupBy('product_id')->select('product_id', DB::raw('sum(totalprice) as totalprice'))->OrderBy('totalprice', 'desc')->limit(5)->get();
        return view('backendV2.dashboard', compact("data", "counts", 'userOrders'));
    }

    public function showDashboardV2()
    {
        extract($this->service->getDashboardData());
        $userOrders = UserOrder::whereHas('product')->with('product')->groupBy('product_id')->select('product_id', DB::raw('sum(totalprice) as totalprice'))->OrderBy('totalprice', 'desc')->limit(5)->get();
        return view('backendV2.dashboard', compact("data", "counts", 'userOrders'));
    }

    public function changeStatus(Request $request)
    {
        UserTicket::where('id', $request->get('ticket'))->update(['status' => $request->get('status')]);
    }
}
