<?php


namespace App\Handlers;

use App\Models\{ProductReviews, UserOrder};

class UserPanelHandler
{
    private $review, $productReview, $userOrder;

    public function __construct($orderId, string $review) {
        $this->review = $review;
        $this->productReview = new ProductReviews();
        $this->userOrder = UserOrder::where("id", $orderId)->first();
        if (empty($this->userOrder)) {
            return 0;
        }
    }

    public function handle() {
        $_enum = $this->review;
        $review = $this->productReview->where("product_id", $this->userOrder->product_id)->first();
        if (empty($review)) {
            $this->productReview->create([
                'product_id' => $this->userOrder->product_id,
                $this->review => 1
            ]);
        } else {
            $review->update([
                $this->review => $review->$_enum + 1
            ]);
        }

        return 1;
    }
}
