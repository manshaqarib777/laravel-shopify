<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;


class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'sells', 'name', 'description', 'interval', 'short_description', 'drop_needed', 'content', 'old_price_in_cent', 'price_in_cent', 'category_id', 'stock_management', 'as_weight', 'weight_available', 'weight_char', 'thumbnail_image'
    ];

    protected $hidden = [
        'content',
    ];

    protected $appends = [
        'is_available',
        'formatted_front_stock_status',
    ];

    public static function getUncategorizedProducts()
    {
        $products_arr = [];

        $products = self::where('category_id', 0)->get();

        foreach ($products as $product) {
            $products_arr[] = $product->id;
        }

        foreach (self::all() as $product) {
            if (ProductCategory::getById($product->category_id) == null && !in_array($product->id, $products_arr)) {
                $products[] = $product;
            }
        }

        return $products;
    }

    public static function getCurrencyCode(){
        if(Setting::getShopCurrency() == "EUR"){
            return "€";
        }else{
            return "$";
        }
    }

    public static function getById($id)
    {
        return self::where('id', $id)->first();
    }

    public static function formatPrice($cent)
    {
        if (Setting::getShopCurrency() == 'EUR') {
            return number_format($cent, 2, ',', '.') . ' ' . Setting::getShopCurrency();
        }else{
            return number_format($cent, 2, '.', ',') . ' ' . Setting::getShopCurrency();
        }
    }

    public static function getFormattedPriceFromCent($cent)
    {
            return self::getFormattedPriceFromCentWithoutCurrency($cent) . ' ' . Setting::getShopCurrency();
    }

    public static function getFormattedPriceFromCentWithoutCurrency($cent)
    {
        if (Setting::getShopCurrency() == 'EUR') {
            return number_format($cent, 2, ',', '.');
        } else {
            return number_format($cent, 2, '.', ',');
        }
        
    }

    public function getInterval()
    {
        if (!$this->asWeight()) {
            return 1;
        }

        return $this->interval ?? 1;
    }

    public function asWeight()
    {
        return $this->as_weight == 1;
    }

    public function getFormattedFrontPrice()
    {
        $currencyCode = Setting::getShopCurrency();
        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        $symbol = $formatter->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
        $currencySymbol = str_replace('0.00', '', $formatter->formatCurrency(0, $currencyCode));

        return str_replace($currencyCode, $currencySymbol, $this->getFormattedPrice());

    }

    public function getFormattedPrice()
    {
        $after = '';

        if ($this->asWeight()) {
            $after = '/' . $this->getWeightChar();
        }

        return $this->getFormattedPriceWithoutCurrency() . ' ' . Setting::getShopCurrency() . $after;
    }

    public function getWeightChar()
    {
        return $this->weight_char;
    }

    public function getFormattedPriceWithoutCurrency()
    {
        if (Setting::getShopCurrency() == 'EUR') {
            return number_format($this->price_in_cent, 2, ',', '.');
        } else {
            return number_format($this->price_in_cent, 2, '.', ',');
        }
    }

    public function getFormattedSalePer($para){
        if (Setting::getShopCurrency() == 'EUR') {
            return number_format($para, 2, ',', '.');
        } else {
            return number_format($para, 2, '.', ',');
        }
    }

    public function getFormatted_old_price_in_cent()
    {
        if (Setting::getShopCurrency() == 'EUR') {
            return number_format($this->old_price_in_cent, 2, ',', '.').' €';
        } else {
            return number_format($this->old_price_in_cent, 2, '.', ',') .' $';
        }
    }

    public function getFormattedOldPrice()
    {
        $after = '';

        if ($this->asWeight()) {
            $after = '/' . $this->getWeightChar();
        }

        return $this->getFormattedOldPriceWithoutCurrency() . ' ' . Setting::getShopCurrency() . $after;
    }

    public function getFormattedOldPriceWithoutCurrency()
    {
        if (Setting::getShopCurrency() == 'EUR') {
            return number_format($this->old_price_in_cent, 2, ',', '.');
        } else {
            return number_format($this->old_price_in_cent, 2, '.', ',');
        }
        
    }

    public function getFormattedFrontStockStatusAttribute()
    {
        if ($this->isUnlimited()) {
            return __('frontend/shop.products.unlimited');
        } else if ($this->asWeight()) {
            $amount = __('frontend/shop.products.weight_available', [
                'weight' => $this->getWeightAvailable(),
                'char' => $this->getWeightChar()
            ]);

            return __('frontend/shop.products.sold_out', ['amount' => $amount]);
        } else {
            if ($this->inStock()) {
                return __('frontend/shop.products.amount_in_stock', ['amount' => $this->getStock()]);
            } else {
                return __('frontend/shop.products.sold_out');
            }
        }
    }

    public function isUnlimited()
    {
        return $this->stock_management == 0 && !$this->asWeight();
    }

    public function getWeightAvailable()
    {
        return $this->weight_available;
    }

    public function inStock()
    {
        return ($this->getStock() > 0 || $this->getStock() == -1) && !$this->asWeight();
    }

    public function getStock()
    {
        if ($this->stock_management <= 0) {
            return -1;
        }

        $stock = ProductItem::where('product_id', $this->id)->count();

        return $stock;
    }

    public function getCategory()
    {
        $productCategory = ProductCategory::where('id', $this->category_id)->first();

        if ($productCategory != null) {
            return $productCategory;
        }

        return (object)[
            'id' => 0,
            'name' => __('frontend/shop.uncategorized'),
            'slug' => 'uncategorized',
        ];
    }

    public function dropNeeded()
    {
        return $this->drop_needed == 1;
    }

    public function isAvailableAmount($amount)
    {
        if ($this->isAvailable()) {
            if ($this->asWeight() && $this->getWeightAvailable() >= $amount) {
                return true;
            } elseif ($this->inStock() && $this->getStock() >= $amount) {
                return true;
            } elseif ($this->isUnlimited()) {
                return true;
            }
        }

        return false;
    }

    public function isAvailable()
    {
        if ($this->isUnlimited()) {
            return true;
        } elseif ($this->asWeight() && $this->getWeightAvailable() > 0) {
            return true;
        } elseif ($this->inStock()) {
            return true;
        }

        return false;
    }

    public function getIsAvailableAttribute()
    {
        return $this->isAvailable();
    }

    public function getSalePercent()
    {
        if ($this->isSale()) {
            return round((($this->old_price_in_cent - $this->price_in_cent) * 100) / $this->old_price_in_cent);
        }

        return 0;
    }

    public function isSale()
    {
        return $this->old_price_in_cent != null && $this->old_price_in_cent > 0 && $this->old_price_in_cent > $this->price_in_cent;
    }

    public function getSells()
    {
        return $this->sells;
    }

    public function getProductDateAttribute()
    {
        return $this->created_at->format("Y-m-d");
    }
}
