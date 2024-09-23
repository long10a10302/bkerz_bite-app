<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    //
    public function index()
    {
        // Lấy giỏ hàng của người dùng hiện tại
        $cartItem = CartDetail::with('product')
            ->whereHas('cart', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        // Kiểm tra nếu giỏ hàng trống
        if ($cartItem->isEmpty()) {
            return view('carts.index', ['message' => 'Your cart is currently empty.']);
        }

        // Trả về view giỏ hàng với dữ liệu sản phẩm trong giỏ hàng
        return view('carts.index', compact('cartItem'));
    }

    public function addCart(Request $request, $productId)
    {
        // Lấy thông tin sản phẩm từ bảng products
        $product = Product::findOrFail($productId);
        $productId = $product->product_id;
        $quantity = $request->input('quantity', 1); // Số lượng mặc định là 1 nếu không có input

        // Kiểm tra xem người dùng đã đăng nhập hay không
        if (Auth::check()) {
            $userId = Auth::id();
            $sessionId = Session::get('session_id');
            // Lấy hoặc tạo giỏ hàng cho người dùng đã đăng nhập
            $cart = Cart::firstOrCreate(['user_id' => $userId, 'session_id' => $sessionId]);
        }
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
        $cartItem = CartDetail::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại trong giỏ, tăng số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa có, tạo mới sản phẩm vào giỏ
            CartDetail::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng']);
    }

    public function updateQuantity(Request $request, $id)
    {
        $cartItem = CartDetail::findOrFail($id);

        // Kiểm tra nếu số lượng >= 1
        if ($request->quantity >= 1) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            return response()->json(['success' => true, 'quantity' => $cartItem->quantity]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid quantity']);
    }

    public function destroyCart($id)
    {
        $cartItem = CartDetail::findOrFail($id);
        $cartId = $cartItem->cart_id;
        $cartItem->delete();
        $cart = Cart::with('cartItems')->find($cartId);

        if ($cart && $cart->cartItems->isEmpty()) {
            // Nếu không còn sản phẩm nào trong giỏ hàng, xóa giỏ hàng
            $cart->delete();
        }

        return redirect()->route('cart')->with('success', 'Cart item removed successfully.');
    }
}
