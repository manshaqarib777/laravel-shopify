<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marque extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque_text',
    ];
}
