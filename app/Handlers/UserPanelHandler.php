<?php


namespace App\Handlers;

use App\Models\{ProductReviews, UserOrder};

use Auth;

class UserPanelHandler
{
    private $review, $productReview, $userOrder,$order_id;

    public function __construct($orderId, string $review) {
        $this->order_id = $orderId;
        $this->review = $review;
        $this->productReview = new ProductReviews();
        $this->userOrder = UserOrder::where("id", $orderId)->first();
        if (empty($this->userOrder)) {
            return 0;
        }
    }

    public function handle() {
        $_enum = $this->review;
        $order_id = $this->order_id;
        $review = $this->productReview->where("order_id", $order_id)->first();
        // dd($this->userOrder->product_id);
        if (empty($review)) {
            $this->productReview->create([
                'product_id' => $this->userOrder->product_id,
               'order_id' => $order_id,
                'user_id'=> Auth::user()->id,
                $this->review => 1
            ]);
        } else {
            // $review->update([
            //     $this->review => $review->$_enum + 1
            // ]);
            return false;
        }

        return 1;
    }
}
