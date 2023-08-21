<?php


namespace App\Handlers;

use App\Models\{Product, UserOrder, UserTicket};

class DashboardHandler
{
    const METRICS = [
        "products" => "product_date",
        "tickets" => "ticket_date",
        "orders" => "order_date"
    ];
    protected $products, $tickets, $orders;

    public function __construct()
    {
        $this->products = Product::select("created_at", "id")->get();
        $this->tickets = UserTicket::where('status', 'open')->get();
        $this->orders = UserOrder::select("created_at", "id")->get();
    }

    public function handle(): array
    {

        $counts = $this->getCounts();
        $data = [];
        foreach (self::METRICS as $type => $groupBy) {
            $data[$type] = $this->getChartData($type, $groupBy);
        }

        return ["counts" => $counts, "data" => $data];
    }

    protected function getCounts()
    {
        return [
            "ticketsCount" => $this->tickets->count(),
            "productsCount" => $this->products->count(),
            "profitCount" => UserOrder::getFormattedTodayWin(),
        ];
    }

    protected function getChartData($type, string $groupBy)
    {
        $data = [];
        foreach ($this->$type->groupBy($groupBy) as $date => $ticketGroup) {
            $data["dates"][] = $date;
            $data["counts"][] = count($ticketGroup);
        }

        return $data;
    }
}
