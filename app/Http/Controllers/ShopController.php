<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wanumber;

class ShopController extends Controller
{
    public function index()
    {
        $wanumber = Wanumber::first();

        $products = Product::selectRaw('
        category_id,
        brand_id,
        MIN(id) as first_id,
        MIN(price) as min_price,
        MAX(price) as max_price,
        (
            SELECT photo
            FROM products AS subproduct
            WHERE subproduct.category_id = products.category_id
            AND subproduct.brand_id = products.brand_id
            LIMIT 1
        ) AS group_photo
    ')
        ->groupBy('category_id', 'brand_id')
        ->paginate(12);

        return view('allshop', [
            "products" => $products,
            "wanumber" => $wanumber
        ]);
    }

    public function detail(Product $product)
    {
        $wanumber = Wanumber::first();

        $relatedProducts = Product::where('category_id', $product->category_id)
                    ->where('brand_id', $product->brand_id)
                    ->get();

        return view('detail', [
            "product" => $product,
            "relatedproducts" => $relatedProducts,
            "wanumber" => $wanumber
        ]);
    }
}