<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = [''];

    public function order()
    {
        return $this->belongsTo(Order::class, 'tst_order_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'id','od_product_id');
    }
}
