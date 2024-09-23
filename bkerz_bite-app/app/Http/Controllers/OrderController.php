<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartDetail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('cartItems.product')->first();
        return view('carts.checkout', compact('cart'));
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'orderDetails' => 'required|array',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();

            // Create a new order
            $order = Order::create([
                'user_id' => $userId,
                'shipping_address' => $request->input('address'),
                'status' => 'Đang xử lý',
            ]);

            // Create order details
            foreach ($request->input('orderDetails') as $detail) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $detail['product_id'],
                    'quantity' => $detail['quantity'],
                    'price' => $detail['price'],
                ]);
            }

            // Clear the cart after successful order creation
            $this->clearCart($userId);

            return response()->json(['message' => 'Order created successfully with a delivery date.']);
        }

        return response()->json(['message' => 'User not authenticated.'], 401);
    }

    public function updateOrder(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'status' => 'required|in:Đang xử lý,Đã giao,Đã hủy',  // Ensure only allowed statuses
    ]);

    // Find the order by its ID
    $order = Order::find($id);  // Correctly passing $id variable here

    if ($order) {
        $order->status = $request->input('status');
        
        try {
            $order->save();
            return redirect()->route('admin.category')->with('success', 'Order updated successfully.');
        } catch (\Exception $e) {
            // Log the exception for debugging (optional)
            \Log::error('Order update failed: ' . $e->getMessage());
    
            return redirect()->route('admin.category')->with('error', 'Order update failed. Please try again.');
        }
    } else {
        return redirect()->route('admin.category')->with('error', 'Order not found.');
    }
    
}

    private function clearCart($userId)
    {
        $cart = Cart::where('user_id', $userId)->first();
        if ($cart) {
            CartDetail::where('cart_id', $cart->cart_id)->delete();
            $cart->delete();
        }
    }
}
