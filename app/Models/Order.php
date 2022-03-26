<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table = 'order';


    public function transactions()
    {
        return $this->hasMany(Order::class, 'tst_order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'od_customer_id');
    }

}
