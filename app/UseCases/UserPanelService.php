<?php


namespace App\UseCases;

use App\Handlers\UserPanelHandler;

class UserPanelService {

    public function setUserOrderReview($orderId, string $review) {
        return (new UserPanelHandler($orderId, $review))->handle();
    }
}
