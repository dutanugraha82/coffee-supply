<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['origin_coffee', 'weight', 'coffee_type', 'shipoption', 'itemcode'];
}
