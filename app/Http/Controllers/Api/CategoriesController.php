<?php

namespace App\Http\Controllers\Api;

use App\Models\Categories;
use App\Models\Product;
use App\Transformers\CategoryTransformer;
use App\Transformers\ProductTransformer;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::query()->where('on_sale', true)->get();
        return $this->response()->collection($categories, new CategoryTransformer());
    }

    public function products($id)
    {
        $products = Product::query()->where('category_id', $id)->where('on_sale', true)->paginate();
        return $this->response()->paginator($products, new ProductTransformer());
    }
}
