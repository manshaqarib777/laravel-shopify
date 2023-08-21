<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        //seed users
        $user = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'language' => 'de',
            'jabber_id' => 'admin@example.com',
            'balance_in_cent' => 0,
            'newsletter_enabled' => 0,
            'password' => \Hash::make('123456'),
        ]);

        if ($user != null) {
            $permissions = [
                'access_backend',
                'jabber_newsletter',
                'manage_articles',
                'manage_faqs',
                'manage_faqs_categories',
                'manage_products',
                'manage_products_categories',
                'manage_tickets',
                'manage_tickets_categories',
                'system_settings',
                'manage_bitcoin_wallet',
                'manage_creditcards',
                'manage_users',
                'manage_users_permissions',
                'manage_orders',
                'jabber_login',
                'system_payments',
                'manage_coupons',
                'manage_delivery_methods',
                'manage_design',
                'manage_media',
                'system_bonus',
            ];

            foreach ($permissions as $permissionString) {
                $permission = Permission::where('permission', $permissionString)->get()->first();

                if ($permission != null) {
                    UserPermission::create([
                        'user_id' => $user->id,
                        'permission_id' => $permission->id,
                    ]);
                }
            }
        }

        $this->call(SettingsSeeder::class);


        DB::unprepared("

INSERT INTO `lv_coupons` (
  `id`, `amount`, `max_usable`, `used`,
  `is_percent`, `code`, `created_at`,
  `updated_at`
)
VALUES
  (
    2, 2, 2, 0, 0, 'Test', '2023-05-12 09:22:47',
    '2023-05-12 09:22:47'
  );
INSERT INTO `lv_faqs` (
  `id`, `category_id`, `question`, `answer`,
  `ordering`, `created_at`, `updated_at`
)
VALUES
  (
    4, 2, 'test', 'est', 1, '2023-05-20 15:57:29',
    '2023-05-20 15:57:29'
  );
INSERT INTO `lv_faqs_categories` (
  `id`, `name`, `slug`, `created_at`,
  `updated_at`
)
VALUES
  (
    2, 'test', NULL, '2023-05-09 22:23:34',
    '2023-05-09 22:23:34'
  );
INSERT INTO `lv_marques` (
  `id`, `marque_text`, `status`, `created_at`,
  `updated_at`
)
VALUES
  (
    2, 'Teeeest', 0, NULL, '2023-06-12 13:46:09'
  ),
  (
    5, 'Discover & Callect Extraordinary Digital Art and Rare NFT\'s',
    0, '2023-04-29 11:35:42', '2023-06-12 13:46:09'
  ),
  (
    6, 'Discover & Callect Extraordinary Digital Art and Rare NFT\'s',
    0, '2023-04-29 11:35:50', '2023-06-12 13:46:09'
  ),
  (
    7, 'test', 0, '2023-05-09 20:55:40',
    '2023-06-12 13:46:09'
  ),
  (
    8, 'scum scum scum scum scum scum scum scum scum',
    0, '2023-05-26 14:02:38', '2023-06-12 13:46:09'
  ),
  (
    9, 'scum scum scum scum scum scum scum scum scum',
    0, '2023-05-26 14:03:08', '2023-06-12 13:46:09'
  ),
  (
    10, 'scum scum scum scum scum scum scum scum scum',
    0, '2023-05-26 14:03:09', '2023-06-12 13:46:09'
  ),
  (
    11, 'scum scum scum scum scum scum scum scum scum',
    0, '2023-05-26 14:03:15', '2023-06-12 13:46:09'
  );

INSERT INTO `lv_notifications` (
  `id`, `custom_id`, `extra_data`, `type`,
  `readed`, `created_at`, `updated_at`
)
VALUES
  (
    1, 1, '121', 'order', 'true', '2023-06-03 14:50:06',
    '2023-06-10 12:19:07'
  );


INSERT INTO `lv_products` (
  `id`, `name`, `description`, `short_description`,
  `content`, `price_in_cent`, `old_price_in_cent`,
  `category_id`, `drop_needed`, `sells`,
  `thumbnail_image`, `interval`, `stock_management`,
  `as_weight`, `weight_available`,
  `weight_char`, `created_at`, `updated_at`
)
VALUES
  (
    50, 'Test', 'test', 'test', '', '0.00',
    '0.00', 5, 0, 0, NULL, 1, 1, 0, 0, '', '2023-06-03 10:39:48',
    '2023-06-03 10:39:48'
  ),
  (
    51, 'Test', 'Test', NULL, '10', '10.00',
    '100.00', 5, 0, 9, NULL, 1, 1, 0, 0, '',
    '2023-06-03 10:40:10', '2023-06-03 14:50:06'
  );


INSERT INTO `lv_products_bonus` (
  `id`, `product_id`, `min_amount`,
  `percent`, `created_at`, `updated_at`
)
VALUES
  (
    1, 10, 11, '111', '2023-06-03 12:39:17',
    '2023-06-03 12:39:17'
  );


INSERT INTO `lv_products_categories` (
  `id`, `name`, `slug`, `keywords`, `meta_tags_desc`,
  `created_at`, `updated_at`
)
VALUES
  (
    5, 'Coin', 'Coin', 'All', 'Coin', '2023-05-02 13:25:53',
    '2023-05-02 13:25:53'
  ),
  (
    6, 'Test', 'te', 'testt', 'test', '2023-05-02 22:16:13',
    '2023-05-02 22:16:13'
  );


INSERT INTO `lv_products_items` (
  `id`, `product_id`, `content`, `created_at`,
  `updated_at`
)
VALUES
  (
    22, 51, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the',
    '2023-06-03 15:17:09', '2023-06-12 12:29:00'
  ),
  (
    23, 51, 'test', '2023-06-03 19:20:39',
    '2023-06-03 19:20:39'
  ),
  (
    24, 51, 't', '2023-06-12 14:01:54',
    '2023-06-12 14:01:54'
  );


INSERT INTO `lv_translations` (
  `id`, `value`, `lang`, `keyword`, `entry_id`,
  `type`, `created_at`, `updated_at`
)
VALUES
  (
    1, 'TESTING', 'en', NULL, 1, 'ticket-category',
    '2023-05-10 13:01:06', '2023-05-10 13:01:06'
  );




INSERT INTO `lv_users_orders` (
  `id`, `user_id`, `name`, `content`,
  `cart_entry_id`, `amount`, `price_in_cent`,
  `totalprice`, `weight`, `delivery_price`,
  `weight_char`, `delivery_method`,
  `status`, `drop_info`, `sell_product_count`,
  `created_at`, `updated_at`, `product_id`,
  `thumbnail_image`
)
VALUES
  (
    1, 1, 'Test Coin', '', 0, 300, '300',
    '90000', 0, 0, '', '', 'completed',
    'eyJpdiI6InkvTE84bk1FSE9OdktKekVleWl3a2c9PSIsInZhbHVlIjoiLy9LQVhaeTc0ZHZnaFZWeWNMdEhZUT09IiwibWFjIjoiNjc0YzA3YjZkMzBhMDcyMWNhZDlhZmMyNmFmM2Y2ZDMyNDk2MGY4ODJiNWU1M2ExZmE1MzYzNTNlMWU5YzBjNiIsInRhZyI6IiJ9',
    NULL, '2023-04-30 08:16:23', '2023-05-02 20:11:46',
    0, NULL
  );


INSERT INTO `lv_users_orders_notes` (
  `id`, `order_id`, `note`, `created_at`,
  `updated_at`
)
VALUES
  (
    1, 2, 'eyJpdiI6ImgxZzRIUjJkQTEwdnNvUGd4Umo0cnc9PSIsInZhbHVlIjoiMjkvNXBFSG9Eb3ROZlJJTjZFTGYvUDg2VVBseEo0SUEzNnJNcURTWTkxUT0iLCJtYWMiOiI4N2I4ZWQwNGU5NWFlOWU4Y2YxMTUyNmYxNzMwZmIwOTFkZGRiNjhiNjQyNTcxZmEwMDQ5MjUyOGU3ZWMwYzEzIiwidGFnIjoiIn0=',
    '2023-04-30 08:51:19', '2023-04-30 08:51:19'
  );



INSERT INTO `lv_users_tickets` (
  `id`, `user_id`, `category_id`, `status`,
  `read_status`, `subject`, `content`,
  `created_at`, `updated_at`
)
VALUES
  (
    21, 10, 1, 'open', 1, 'Testing', 'eyJpdiI6IlRjZ29rb1BUb201U2hIZ0ZMY0twK2c9PSIsInZhbHVlIjoiNGxLeFRodnBPQWZ4aFZybW1BMGd2WXlUdnVsbzBsamozajViN09HejZPVT0iLCJtYWMiOiI1NGY0NjA0YjlhZDU2MDBhMjQ3ODdjY2ZjOWM5MjJjOTQwNDg2ZTkwZDA5MmUyY2JiNjVlYjNlMDNhMGY0NmE1IiwidGFnIjoiIn0=',
    '2023-05-10 14:29:54', '2023-05-17 16:09:59'
  );



INSERT INTO `lv_users_tickets_categories` (
  `id`, `name`, `created_at`, `updated_at`
)
VALUES
  (
    1, 'TESTING', '2023-04-24 22:27:12',
    '2023-05-10 14:24:28'
  ),
  (
    12, 'Test 2', '2023-05-10 14:40:28',
    '2023-05-10 14:40:28'
  ),
  (
    13, 'Other Coin', '2023-05-11 15:22:14',
    '2023-05-11 15:22:14'
  );


INSERT INTO `lv_users_tickets_replies` (
  `id`, `user_id`, `ticket_id`, `content`,
  `created_at`, `updated_at`
)
VALUES
  (
    1, 1, 6, 'eyJpdiI6IjkzT1BJT2NYR1BEc0dYOCtpOWRqNmc9PSIsInZhbHVlIjoieEFsNjV2eXRndjZpa3NMcTJ2bE5jZz09IiwibWFjIjoiYTEzMWI1YjU5MWZjNjY0MDdlY2I3MGZjZDdkYzkyMTk5MmUwMGIyOWJhM2I4ZWViMjgyZWQ3YzhiODMwNjVjOCIsInRhZyI6IiJ9',
    '2023-04-26 12:30:27', '2023-04-26 12:30:27'
  ),
  (
    2, 1, 11, 'eyJpdiI6ImJXUjlBY1ZnWkhXRDBlSTJQQk5jL3c9PSIsInZhbHVlIjoiYzlRZ1NDV1NBNHRTWnVlRmVtcFp5UT09IiwibWFjIjoiYzY1ZDc5NDlhNGMxOTUwZTA0MTNiZjAwZjQ0ZjQ0MWY3MWZhNmEyYWRiY2FjMjEyYmEwODU0Y2Y5ZmQwOTY4YiIsInRhZyI6IiJ9',
    '2023-04-27 14:02:20', '2023-04-27 14:02:20'
  ),
  (
    3, 1, 17, 'eyJpdiI6Im40cDJqWktWcy9xcG9CSWc1UXhMc2c9PSIsInZhbHVlIjoiTFh1THFDU0t0Ulp5NTNLbWREajgwZz09IiwibWFjIjoiN2U1OTNlZjFlNGJmMmQxMmI1MGRlYWM2OGY1MmI0ODkyNWM0M2M2NTgxNTlmOGY5Mzg1MmI4ZWZhMzJiZWJlOSIsInRhZyI6IiJ9',
    '2023-05-10 12:38:36', '2023-05-10 12:38:36'
  ),
  (
    4, 1, 17, 'eyJpdiI6IjhTMmNkRDhsQ3JEbjhGaC94OU0xbHc9PSIsInZhbHVlIjoiYUtNQngyZXA5SlI1QlpQVkZNVzQ0UT09IiwibWFjIjoiMDRjM2Y3NjU3NThjYjAxMzY2NmYyYjcxYmI1MDA3NzY2MjE3MDdkNjIxZDc0OGJiMjg5MDNlYWIxNWJhMWYzOSIsInRhZyI6IiJ9',
    '2023-05-10 12:39:34', '2023-05-10 12:39:34'
  ),
  (
    5, 1, 20, 'eyJpdiI6IngwRGMzc2Q3MFNOMHdKTng5cnR2MlE9PSIsInZhbHVlIjoieWNFdFo0YmN5YWpPdk5qTXR2REE4QT09IiwibWFjIjoiNDQ5MDQ3MDQ4Nzk0OWJlZGRhMWNiZTM4MjE3MTYwZGUzOTY3ZWY2NDlhYTJhNWM1OTRjZGVmYmMxZjliMTIzYiIsInRhZyI6IiJ9',
    '2023-05-10 14:17:12', '2023-05-10 14:17:12'
  ),
  (
    6, 1, 22, 'eyJpdiI6IkdjVTRwSkNQN0E0NW5pajdzalRRSWc9PSIsInZhbHVlIjoiQzVrNXdZeFoxTHpLWXkydEhvcyt5VFN1blpBaVpQWldHejdnYmNjQmZoYz0iLCJtYWMiOiIwM2JhZTYzZDY0ZTMzOWNmM2QxZDU2MTU4ZWZhZWNlMzM1NWUzMWYyMDI2YmQwOGIxMDhhYWNhN2QyNWRhZWQ3IiwidGFnIjoiIn0=',
    '2023-05-15 12:11:55', '2023-05-15 12:11:55'
  ),
  (
    7, 1, 24, 'eyJpdiI6InFoVFVGYjYwUFgrYmN6VEhYMHRZTnc9PSIsInZhbHVlIjoiTkx3S3NhQXhuSGRpTUozbEF6YTdlUzVLTmY2ZEwxcmcrT2tBODVIWDZoTT0iLCJtYWMiOiI3ZGU0MGFiZTI3OTNlZDIxODM1ZWRhMmE4NWFhYWQ1ZGRkYzUzYjc4NDBlMTkxYTQ5MmI4ZGIyYzNjZmYyOGUyIiwidGFnIjoiIn0=',
    '2023-05-19 06:22:11', '2023-05-19 06:22:11'
  ),
  (
    8, 1, 24, 'eyJpdiI6IkxBbzJ0RnVhdmxjU05QdThJMWp0UWc9PSIsInZhbHVlIjoiTTArTGc0UDlwQlcxcmxTVFVIaEpjQT09IiwibWFjIjoiNWNlMzMzMzQ1MmNiZWZhZmQ4NWJjMDViODg2OGY4NDZiNjNlOTMxNTQzODk1NjU5OWYzYWRkYzc1ZmQ1OGZhNCIsInRhZyI6IiJ9',
    '2023-05-19 09:48:40', '2023-05-19 09:48:40'
  ),
  (
    9, 1, 28, 'eyJpdiI6InllQnQ1Y3gvdHAyTldMSXZvcXNLRlE9PSIsInZhbHVlIjoiNGQyLzkyamd0bDhwRU41Smd2bmliUT09IiwibWFjIjoiZWJkMGVmNGQzOGNlMjVkZDdlOTM1ZmZjNDQxZGE0NDdhMGU5MmU4MDFlNThkNmM2NmM2NWEwODkyYTUwMmUwNiIsInRhZyI6IiJ9',
    '2023-05-29 18:50:54', '2023-05-29 18:50:54'
  ),
  (
    10, 1, 28, 'eyJpdiI6Ik5DZEVXaHltUEZXTGhDK2t2V3EreWc9PSIsInZhbHVlIjoiRUpJRWxnK1c0TG1KYjc1ejVwMEI4dz09IiwibWFjIjoiOGEyNmJjZDUxY2MyM2IxNjA1MmM3YTQ1ZWE2M2YwZjVlN2QxMzE4M2I4NmFkNDkwY2VjNDIxYzAwNTIwMzhmNyIsInRhZyI6IiJ9',
    '2023-05-31 09:12:47', '2023-05-31 09:12:47'
  ),
  (
    11, 1, 28, 'eyJpdiI6InRCdU5qcGZ1M1ZqZnNPNU1ISmhCMmc9PSIsInZhbHVlIjoic1I4QlFDVExyVTl5VUw1RWhTV2E2UT09IiwibWFjIjoiYmE0YzY0ZjAwNGUwNzdiZTczMjRjZWU5YmI5ODI0ZTUyOTg4NTYyMDdjYjljMGYwMDQ2M2YxOGJlMDBkMjI1MCIsInRhZyI6IiJ9',
    '2023-05-31 09:13:55', '2023-05-31 09:13:55'
  ),
  (
    12, 1, 29, 'eyJpdiI6InNMeVM0akpGaWthM1QrRFp4eG9ramc9PSIsInZhbHVlIjoicEtwUWJhRjBJVDMrTU9LR0RPSlJtZz09IiwibWFjIjoiNGYxMjk2YWZjZTY5YzBlZDdhN2RmYmNiYzQ5M2Y3OWI0ZTliY2RmNzRhZGYzYTgxNDBmNTM4ZWZlODc1MjE1MyIsInRhZyI6IiJ9',
    '2023-05-31 12:30:23', '2023-05-31 12:30:23'
  ),
  (
    13, 1, 30, 'eyJpdiI6Ijc1VjBpbmJ4M2s4VnlXTnA5MjIzTEE9PSIsInZhbHVlIjoiN3AwLzBsYVdvdHNJWnBkbTB3N0lwdz09IiwibWFjIjoiODNmODRhNjMwZmEwN2E3ZDg5ZjUyYTBjMTczMDJiMjg2YzY0NWI3MzIxNmZhMTBiZTI0NzEwN2I0YmI3ZmY2NyIsInRhZyI6IiJ9',
    '2023-06-01 14:05:17', '2023-06-01 14:05:17'
  ),
  (
    14, 19, 30, 'eyJpdiI6IkZvM1lOM0txSWJYN2VFbEhQTXNnQUE9PSIsInZhbHVlIjoiaTkxeENROXZkV1JuZzNSMitwRHhqdz09IiwibWFjIjoiMTJjZGJmNzI0NzRhNzE5ZjBjYmNiZTBiODAxOTc2ZTY4YTM5YjU2N2Y2YWE3M2E1YjAyYzc4MjBhYTkzZjZjNSIsInRhZyI6IiJ9',
    '2023-06-01 14:05:49', '2023-06-01 14:05:49'
  ),
  (
    15, 1, 29, 'eyJpdiI6IkZoTUdjM0xtTnczUnZiMjRoSGhXVFE9PSIsInZhbHVlIjoiSTMyVmRmUWs2NUNpQ3Rybk5RcFBiZz09IiwibWFjIjoiMGY1NzU0N2RmMmI1N2Q1OTNlOGIyMGQ0MjVhMmY5YjlmZTZhODRlNGI1NzAxOWNiYzhlOGMxMDVjNDJjNTE2YSIsInRhZyI6IiJ9',
    '2023-06-03 14:51:31', '2023-06-03 14:51:31'
  );


INSERT INTO `lv_users_transactions` (
  `id`, `user_id`, `wallet`, `txid`,
  `status`, `payment_method`, `amount`,
  `amount_cent`, `confirmations`,
  `created_at`, `updated_at`
)
VALUES
  (
    5, 14, NULL, NULL, 'paid', 'btc', 38600,
    3860000, 0, '2023-05-28 09:02:06',
    '2023-05-28 09:02:06'
  ),
  (
    6, 15, NULL, NULL, 'paid', 'btc', 20000,
    2000000, 0, '2023-05-28 09:06:28',
    '2023-05-28 09:06:28'
  ),
  (
    7, 14, NULL, NULL, 'paid', 'btc', 83600,
    8360000, 0, '2023-05-28 14:20:45',
    '2023-05-28 14:20:45'
  ),
  (
    8, 1, NULL, NULL, 'paid', 'btc', 1962,
    196200, 0, '2023-05-28 14:57:25',
    '2023-05-28 14:57:25'
  );


        ");
    }
}
