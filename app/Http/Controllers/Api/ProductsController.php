<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Transformers\ProductTransformer;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()->where('on_sale', true)->paginate(16);
        return $this->response()->paginator($products, new ProductTransformer());
    }

    public function show($id)
    {
        return $this->response()->item(Product::findOrFail($id),new ProductTransformer());
    }
}
