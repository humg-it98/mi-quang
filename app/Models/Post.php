<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $guarded = [''];

    public function postcategories(){
        return $this->belongsTo(PostCategory::class,'post_cate_id');
    }
}
