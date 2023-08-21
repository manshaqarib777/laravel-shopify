<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    use HasFactory;

    public $table = "product_reviews";

    protected $fillable = [
        'product_id', "user_id","order_id", 'positive', "negative" , 
    ];
}
