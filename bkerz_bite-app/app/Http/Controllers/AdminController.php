<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderDetail;

class AdminController extends Controller
{
    //
    public function index()
    {
        // Tổng doanh thu
        $todayRevenue = OrderDetail::whereDate('created_at', now())->sum(DB::raw('quantity * price'));
        $weeklyRevenue = OrderDetail::whereBetween('created_at', [now()->startOfWeek(), now()])->sum(DB::raw('quantity * price'));
        $monthlyRevenue = OrderDetail::whereMonth('created_at', now()->month)->sum(DB::raw('quantity * price'));
        $yearlyRevenue = OrderDetail::whereYear('created_at', now()->year)->sum(DB::raw('quantity * price'));

        // Tổng số đơn hàng
        $todayOrders = Order::whereDate('created_at', now())->count();
        $weeklyOrders = Order::whereBetween('created_at', [now()->startOfWeek(), now()])->count();
        $monthlyOrders = Order::whereMonth('created_at', now()->month)->count();

        // Giá trị đơn hàng trung bình
        $averageOrderValue = OrderDetail::avg(DB::raw('quantity * price'));

        // Sản phẩm bán chạy nhất (Top 5)
        $topSellingProducts = OrderDetail::with('product')
            ->selectRaw('product_id, SUM(quantity) as total_quantity')
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->take(5)
            ->get();

        // Doanh thu theo danh mục
        

        // Khách hàng mới vs khách hàng quay lại
      

        // Tình trạng đơn hàng
        $orderStatusCounts = Order::selectRaw('status, COUNT(*) as count')->groupBy('status')->get();

        // Xu hướng đơn hàng
        $orderTrends = Order::selectRaw('DATE(created_at) as date, COUNT(*) as total_orders')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return view('admins.index', compact(
            'todayRevenue', 'weeklyRevenue', 'monthlyRevenue', 'yearlyRevenue',
            'todayOrders', 'weeklyOrders', 'monthlyOrders', 'averageOrderValue',
            'orderStatusCounts', 'orderTrends'
        ));
    }
    //-----------------------------------------------------------------------------------------------

    public function category()
    {
        $categories = Category::all();
        return view('admins.category', compact('categories'));
    }

    public function addCat()
    {
        return view('admins.category_create');
    }
    public function editCat($id)
    {
        $category = Category::find($id);
        return view('admins.category_edit', compact('category'));
    }

    public function order(){
        $orders = Order::with('user')->get();
        return view('admins.order',compact('orders'));
    }

    public function createCat(Request $request)
    {
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

        return redirect()->route('admin.category')->with('success', 'Category created successfully.');
    }

    public function updateCat(Request $request, $id)
    {
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

        $category = Category::find($id);

        $category->category_name = $request->category_name;
        $category->description = $request->description;

        if ($request->hasFile('img_url')) {
            $filename = $category->img_url;
            $imagePath = public_path('images/' . $filename);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $file = $request->file('img_url');
            $filename = 'image' . time() . '-' . $request->title . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $category->img_url = $filename;
        }

        $category->save();

        return redirect()->route('admin.category')->with('success', 'Category udpated successfully.');
    }

    public function destroyCat($id)
    {
        $category = Category::find($id);
        $filename = $category->img_url;
        $imagePath = public_path('images/' . $filename);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $category->delete(); // Delete the category

        return redirect()->route('admin.category')->with('success', 'Category deleted successfully.');
    }
    //---------------------------------------------------------------------------------------------------------------
    public function cake()
    {
        $cakes = Product::with('category')->whereNotNull('category_id')->get();
        return view('admins.cake', compact('cakes'));
    }


    public function addCake()
    {
        $categories = Category::all();
        return view('admins.cake_create', compact('categories'));
    }


    public function createCake(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $messages = [
            'name.required' => 'Cake name is required',
            'name.string' => 'Cake name must be a string',
            'name.max' => 'Cake name may not be greater than 255 characters',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description may not be greater than 1000 characters',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'price.min' => 'Price must be at least 0',
            'category_id' => 'Category_id must be required',
            'img_url.image' => 'Uploaded file must be an image',
            'img_url.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'img_url.max' => 'Image size may not be greater than 2MB',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new cake entry
        $cake = new Product;
        $cake->name = $request->name;
        $cake->description = $request->description;
        $cake->price = $request->price;
        $cake->category_id = $request->category_id;
        // Handle image upload
        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $filename = 'cake_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $cake->image_url = $filename;
        }

        $cake->save();

        return redirect()->route('admin.cake')->with('success', 'Cake added successfully.');
    }

    public function editCake($id)
    {
        // Tìm sản phẩm theo ID và nạp mối quan hệ category
        $cake = Product::with('category')->findOrFail($id);
        // Lấy tất cả các danh mục
        $categories = Category::all();

        return view('admins.cake_edit', compact('cake', 'categories'));
    }

    public function updateCake(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $messages = [
            'name.required' => 'Cake name is required',
            'name.string' => 'Cake name must be a string',
            'name.max' => 'Cake name may not be greater than 255 characters',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description may not be greater than 1000 characters',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'price.min' => 'Price must be at least 0',
            'img_url.image' => 'Uploaded file must be an image',
            'img_url.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'img_url.max' => 'Image size may not be greater than 2MB',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cake = Product::find($id);

        $cake->name = $request->name;
        $cake->description = $request->description;
        $cake->price = $request->price;
        $cake->category_id = $request->input('category_id');

        if ($request->hasFile('img_url')) {
            $filename = $cake->image_url;
            $imagePath = public_path('images/' . $filename);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $file = $request->file('img_url');
            $filename = 'image' . time() . '-' . $request->title . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $cake->image_url = $filename;
        }

        $cake->save();

        return redirect()->route('admin.cake')->with('success', 'Cake added successfully.');
    }

    public function destroyCake($id)
    {
        $cake = Product::find($id);
        $filename = $cake->image_url;
        $imagePath = public_path('images/' . $filename);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $cake->delete();
        return redirect()->route('admin.cake')->with('success', 'Cake destroyed successfully.');
    }
    //----------------------------------------------------------------------------------------------------------
    public function review()
    {
        $reviews = Review::with(['user', 'product'])->get();
        return view('admins.review',compact('reviews'));
    }
}
