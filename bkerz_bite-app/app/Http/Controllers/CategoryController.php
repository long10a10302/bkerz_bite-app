<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function overview()
    {
        // Lấy danh sách categories với phân trang
        $categories = Category::paginate(3); // Thay số 6 bằng số danh mục bạn muốn hiển thị mỗi trang.

        // Pass the categories to the view
        return view('menu.overview', compact('categories'));
    }

    public function showCookiesMacarons($id)
    {
        // Lấy category theo tên
        $category = Category::where('category_id', $id)->first();
        // Nếu category không tồn tại thì có thể xử lý lỗi ở đây (ví dụ trả về 404)
        if (!$category) {
            abort(404, 'Category not found.');
        }
        // Lấy tất cả sản phẩm thuộc category đó
        $products = $category->products;
        // Trả về view với category và danh sách sản phẩm
        return view('menu.categorydetail', compact('category', 'products'));
    }
    public function getProductsByCategory($id)
    {
        $category = Category::where('category_id', $id)->firstOrFail();

        // Get the products related to the category
        $products = $category->products; // This uses the relationship defined in the Category model

        return view('products.index', compact('category', 'products'));
    }
}
