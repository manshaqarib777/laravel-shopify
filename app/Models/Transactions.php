<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'btc_transactions';

    protected $fillable = [
        'order_id', 'invoice_id', 'amount', 'status'
    ];
}
