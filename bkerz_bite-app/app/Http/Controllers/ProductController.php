<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Thêm Category model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showCategory($categoryId)
{
    $category = Category::with('products')->find($categoryId);
    return view('products.category', compact('category'));
}
public function show($id)
{
    $product = Product::with('category')->find($id);
    return view('products.show', compact('product'));
}
public function index(Request $request)
{
    $query = Product::query();
    
    // Apply category filter if present
    if ($request->has('category_id')) {
        $query->where('category_id', $request->input('category_id'));
    }
    
    // Apply sorting
    if ($request->has('sort')) {
        $query->orderBy($request->input('sort'), 'asc');
    }
    
    $products = $query->with('category')->get();
    return view('products.index', compact('products'));
}
public function search(Request $request)
{
    $searchTerm = $request->input('query');
    $products = Product::where('name', 'LIKE', "%{$searchTerm}%")
                       ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                       ->get();
    return view('products.index', compact('products'));
}


}
