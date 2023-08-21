<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RestoreDbStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
          ALTER TABLE `lv_products` CHANGE `short_description` `short_description` longtext COLLATE utf8mb4_unicode_ci;
          ALTER TABLE `lv_products` CHANGE `price_in_cent` `price_in_cent` decimal(11,2) NOT NULL DEFAULT '0.00';
          ALTER TABLE `lv_products` CHANGE `old_price_in_cent` `old_price_in_cent` decimal(11,2) DEFAULT '0.00';
          ALTER TABLE `lv_translations` CHANGE `value` `value` longtext COLLATE utf8mb4_unicode_ci;
          ALTER TABLE `lv_users` CHANGE `jabber_id` `jabber_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL;
          ALTER TABLE `lv_users` CHANGE `balance_in_cent` `balance_in_cent` decimal(11,2) NOT NULL DEFAULT '0.00';
          ALTER TABLE `lv_users_cart` CHANGE `product_id` `product_id` int DEFAULT NULL;
          ALTER TABLE `lv_users_cart` CHANGE `amount` `amount` int DEFAULT NULL;
          ALTER TABLE `lv_users_orders` CHANGE `content` `content` longtext COLLATE utf8mb4_unicode_ci;
          ALTER TABLE `lv_users_orders` CHANGE `price_in_cent` `price_in_cent` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0';
          ALTER TABLE `lv_users_orders` CHANGE `totalprice` `totalprice` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0';
          ALTER TABLE `lv_products` ADD `thumbnail_image` text COLLATE utf8mb4_unicode_ci;
          ALTER TABLE `lv_users` ADD `photo` text COLLATE utf8mb4_unicode_ci;
          ALTER TABLE `lv_users` ADD `cover` text COLLATE utf8mb4_unicode_ci;
          ALTER TABLE `lv_users` ADD `shop_name` text COLLATE utf8mb4_unicode_ci;
          ALTER TABLE `lv_users_cart` ADD `qty` int DEFAULT NULL;
          ALTER TABLE `lv_users_orders` ADD `sell_product_count` int DEFAULT NULL;
          ALTER TABLE `lv_users_orders` ADD `product_id` int NOT NULL;
          ALTER TABLE `lv_users_orders` ADD `thumbnail_image` text COLLATE utf8mb4_unicode_ci;
          ALTER TABLE `lv_users_tickets` ADD `read_status` int NOT NULL DEFAULT '0';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
