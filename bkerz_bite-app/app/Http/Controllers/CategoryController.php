<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function overview()
 
    //public function showOverview()
{
    // Retrieve categories from the database
    $categories = Category::all();

    // Pass the categories to the view
    return view('menu.overview', compact('categories'));
}
public function showCookiesMacarons($categoryName)
{
    // Lấy category theo tên
    $category = Category::where('category_name', $categoryName)->first();
    // Nếu category không tồn tại thì có thể xử lý lỗi ở đây (ví dụ trả về 404)
    if (!$category) {
        abort(404, 'Category not found.');
    }
    // Lấy tất cả sản phẩm thuộc category đó
    $products = $category->products;
    // Trả về view với category và danh sách sản phẩm
    return view('menu.categorydetail', compact('category', 'products'));
}
public function getProductsByCategory($catName)
{
    $category = Category::where('category_name', $catName)->firstOrFail();
    
        // Get the products related to the category
        $products = $category->products; // This uses the relationship defined in the Category model
    
        return view('products.index', compact('category', 'products'));
}
}
