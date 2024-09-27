<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class HomeController extends Controller
{
    //
    public function index()
    {
        $categories = Category::paginate(6); // Thay số 6 bằng số danh mục bạn muốn hiển thị mỗi trang.
        return view('home', compact('categories'));

        // Pass categories to the home view

    }
}
