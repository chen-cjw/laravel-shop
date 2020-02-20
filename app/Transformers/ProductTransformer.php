<?php
namespace App\Transformers;
use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['skus'];

    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'title' => $product->title,
            'description' => $product->description,
            'image' => $product->image,
            'on_sale' => $product->on_sale,
            'stock' => $product->stock,
            'rating' => $product->rating,
            'sold_count' => $product->sold_count,
            'price' => $product->price,
            'review_count' => $product->review_count,
            'created_at' => $product->created_at->toDateTimeString(),
            'updated_at' => $product->updated_at->toDateTimeString(),
        ];
    }

    public function includeSkus(Product $product)
    {
        return $this->collection($product->skus, new ProductSkuTransformer());
    }
}