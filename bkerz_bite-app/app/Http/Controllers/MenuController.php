<?php

namespace App\Http\Controllers;
use App\Models\Category; // Thêm Category model
use Illuminate\Http\Request;

class MenuController extends Controller

{

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
    public function showConfections()
    {
        return view('menu.confections'); // Đảm bảo rằng đường dẫn view là đúng
    }
    public function showThepeacockserieshocolatebars()
    {
        return view('menu.the-peacock-series-chocolate-bars'); // Đảm bảo rằng đường dẫn view là đúng
    }
}
