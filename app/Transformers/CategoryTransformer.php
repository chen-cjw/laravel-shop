<?php
namespace App\Transformers;
use App\Models\Categories;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Categories $product)
    {
        return [
            'id' => $product->id,
            'title' => $product->title,
            'sort_num' => $product->sort_num,
            'on_sale' => $product->on_sale,
            'created_at' => $product->created_at->toDateTimeString(),
            'updated_at' => $product->updated_at->toDateTimeString(),
        ];
    }
}