<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function index(){
        
        return view('admins.index');
    }

    public function category(){
        $categories = Category::all();
        return view('admins.category',compact('categories'));
    }

    public function addCat(){
        return view('admins.category_create');
    }
    public function editCat($id){
        $category = Category::find($id);
        return view('admins.category_edit',compact('category'));
    }
    public function cake(){
        $cakes = Product::all();
        return view('admins.cake',compact('cakes'));
    }

    public function createCat(Request $request){
        $rules = [
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ];
    
        $messages = [
            'category_name.required' => 'Category name is required',
            'category_name.string' => 'Category name must be a string',
            'category_name.max' => 'Category name may not be greater than 255 characters',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description may not be greater than 1000 characters',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = new Category;

        $category->category_name = $request->category_name;
        $category->description = $request->description;
    
        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $extension = $file->getClientOriginalExtension();
            $filename = 'image' . time() . '-' . $request->title . '.' . $extension;
            $image_path = public_path('images');
            // echo "<h1>ahhaa".$filename."</h1>";
            // echo $image_path;
            // die();
            $file->move($image_path, $filename);
            $category->img_url = $filename;
        } 
        
        $category->save();

        return redirect()->route('admin.category')->with('success', 'Post created successfully.');
    }

    public function updateCat(Request $request){
        $rules = [
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ];
    
        $messages = [
            'category_name.required' => 'Category name is required',
            'category_name.string' => 'Category name must be a string',
            'category_name.max' => 'Category name may not be greater than 255 characters',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description may not be greater than 1000 characters',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    }

}
