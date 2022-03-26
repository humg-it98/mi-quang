<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $guarded = [''];

    public function categories(){
        return $this->belongsTo(ProductCategory::class,'pro_category_id');
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class,'od_product_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'cm_product_id');
    }
}
