<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Thêm Category model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($productName)
{
    // Find the product by name
    $product = Product::where('name', $productName)->first();
    
    if (!$product) {
        abort(404, 'Product not found.');
    }

    $relatedProducts = Product::where('category_id', $product->category_id)
    ->where('name', '!=', $product->name) // Exclude the current product
    ->take(4) // Limit to 4 products
    ->get();
    // Since you're finding a single product, not a category, you can return just that product
    return view('products.show', compact('product','relatedProducts'));
}


public function getProductsByCategory($catName)
{
    $category = Category::where('category_name', $catName)->firstOrFail();
    
        // Get the products related to the category
        $products = $category->products; // This uses the relationship defined in the Category model
    
        return view('products.index', compact('category', 'products'));
}

}
