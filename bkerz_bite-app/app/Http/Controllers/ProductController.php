<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Thêm Category model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',compact('products'));
    }
    public function show($id)
{
    // Find the product by ID
    $product = Product::find($id);

    if (!$product) {
        abort(404, 'Product not found.');
    }

    // Get related products by category, excluding the current product
    $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('product_id', '!=', $product->id) // Exclude the current product by ID
        ->take(4) // Limit to 4 products
        ->get();

    // Return the view with the product and related products
    return view('products.show', compact('product', 'relatedProducts'));
}



    public function getProductsByCategory($catName)
    {

        $category = Category::where('category_name', $catName)->firstOrFail();

        // Get the products related to the category
        $products = $category->products; // This uses the relationship defined in the Category model
       // Change 'Item' to your model and 10 to your preferred number of items per page
        return view('products.index', compact('category', 'products'));
    }
}
