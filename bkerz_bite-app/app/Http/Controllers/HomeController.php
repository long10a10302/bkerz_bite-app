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
        $categories = Category::all();
        return view('home', compact('categories'));

        // Pass categories to the home view

    }
}
