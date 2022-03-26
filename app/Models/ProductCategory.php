<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'productcategories';
    protected $guarded = [''];

    public function products(){
        return $this->hasMany(Product::class,'pro_category_id');
    }
}
