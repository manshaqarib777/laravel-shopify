<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $settings = [
            [
                'key' => 'app.shop_name',
                'value' => 'Shop Name',
                'type' => 'string'
            ],
            [
                'key' => 'app.shop_logo',
                'value' => '16838828281.jpg',
                'type' => 'string'
            ],
            [
                'key' => 'app.shop_banner',
                'value' => '1683882274.jpg',
                'type' => 'string'
            ],
            [
                'key' => 'app.shop_currency',
                'value' => 'euro',
                'type' => 'string'
            ]
        ];
        if(!empty($settings)){
            foreach($settings as $setting){
                $settingRow = Setting::where([
                    'key' => $setting['key'],
                ])->first();
                if(!empty($settingRow)){
                    $settingRow->value = $setting['value'];
                    $settingRow->type = $setting['type'];
                } else {
                    Setting::create($setting);
                }
            }
        }*/

        DB::unprepared("
        INSERT INTO `lv_settings` (`id`, `key`, `value`, `type`, `before_add`, `after_add`, `created_at`, `updated_at`) VALUES
                    (1, 'app.name', 'Laravel-Site.net', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-05-18 13:27:36'),
                    (2, 'app.url', 'https://laravel-site.net', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (3, 'app.asset_url', '/assets/', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (4, 'app.media_url', '/media/', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (5, 'app.timezone', 'Europe/Berlin', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (6, 'app.cipher', 'AES-256-CBC', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (7, 'mail.from.name', 'OpenFraudCart', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (8, 'mail.from.address', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (9, 'mail.port', '587', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (10, 'mail.host', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (11, 'mail.driver', 'smtp', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (12, 'mail.username', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (13, 'mail.password', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (14, 'mail.encryption', 'tls', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (15, 'backend.name', 'Laravel-Site.net Panel', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (16, 'app.access_only_for_users', '1', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (17, 'shop.replace_rules', '0', 'int', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (18, 'shop.currency', 'dollar', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-06-03 09:02:15'),
                    (19, 'shop.btc_confirms_needed', '1', 'int', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (20, 'shop.total_sells', '11741', 'int', NULL, NULL, '2023-04-19 18:49:41', '2023-06-03 14:50:06'),
                    (21, 'jabber.address', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (22, 'jabber.username', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (23, 'jabber.password', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (24, 'bitcoin.api', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (25, 'register.newsletter_enabled', '1', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (26, 'shop.creditcards.enabled', '0', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (27, 'bitcoin.primarywallet', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (28, 'app.available.locales', 'de,en', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (29, 'app.locale', 'de', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (30, 'shop.bonus_in_percent', '0.95', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (31, 'theme.color1', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (32, 'theme.color2', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (33, 'theme.color3', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (34, 'theme.color4', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (35, 'theme.color5', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (36, 'theme.color6', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (37, 'theme.color7', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (38, 'theme.color8', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (39, 'theme.color9', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (40, 'theme.color.enable', '0', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (41, 'theme.logo', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (42, 'theme.favicon', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (43, 'theme.background', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (44, 'theme.custom.css', 'body {\r\n                    /*\r\n                    background-color: #fff;\r\n                    background-repeat: no-repeat;\r\n                    background-position: center;\r\n                    background-image: url(\'\');\r\n                    */\r\n                }', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (45, 'import.custom.delimiter', 'test', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-05-17 08:17:07'),
                    (46, 'api.enabled', '1', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
                    (47, 'api.key', 'eyJpdiI6InJXRjBKMzdsQnp3ZXFmNG5sWnlPTlE9PSIsInZhbHVlIjoiSng0MTc2M0JZZnVJNFNHN1l6QndvNjFZY3BwRzU2a1JsOG9uUHUycFUzVT0iLCJtYWMiOiI5MWY2MzYwNjZlNzI3MDRmMzQ1N2UzNzQxZTBkMjhhYzM2ZTFlYWQ4OGUwODNhZTk4MTBmNzBlZGI3NDg1N2NhIiwidGFnIjoiIn0=', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-05-18 13:27:36'),
                    (48, 'app.shop_name', 'Shop Name 1', 'string', NULL, NULL, '2023-05-21 10:50:33', '2023-05-28 09:16:17'),
                    (49, 'app.shop_logo', '1685713586.about-hostiko-img.jpg', 'string', NULL, NULL, '2023-05-21 10:50:33', '2023-06-02 15:46:26'),
                    (50, 'app.shop_banner', '', 'string', NULL, NULL, '2023-05-21 10:50:33', '2023-06-02 15:26:21'),
                    (51, 'webhook.secret', '86yNsFlx5toqNkFNdn8g59', 'string', NULL, NULL, '2023-05-28 05:03:31', '2023-05-28 05:03:31'),
                    (53, 'webhook.secret', 'Jlp7wRlAGr1QnHyXNIQmOYSzyhF7GUNO', 'string', NULL, NULL, '2023-05-28 06:50:53', '2023-05-28 06:50:53'),
                    (54, 'webhook.id', 'HS1MSCefhN15fmvh2zhyHH', 'string', NULL, NULL, '2023-05-28 06:50:53', '2023-05-28 06:50:53'),
                    (55, 'reserved_balance', '0', 'string', NULL, NULL, '2023-05-28 09:02:06', '2023-05-28 14:57:25'),
                    (57, 'minimum_withdrawal', '2', 'string', NULL, NULL, NULL, NULL);
        ");
    }
}
