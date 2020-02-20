<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'on_sale','stock',
        'rating', 'sold_count', 'review_count','category_id'
    ];
    protected $casts = [
        'on_sale' => 'boolean', // on_sale 是一个布尔类型的字段
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class,'category_id','id');
    }
    // 与商品SKU关联
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }
}
