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

    public function status()
    {
        $userId = Auth::id();

        // Retrieve all orders for the authenticated user, including their order details and products
        $orders = Order::with('orderItems.product')
            ->where('user_id', $userId)
            ->get();

        return view('carts.status', compact('orders'));
    }


    public function createOrder(Request $request)
    {
        // Validate the request
        $request->validate([
            'address' => 'required|string',
            'orderDetails' => 'required|array',
        ]);
    
        // Check if the user is authenticated
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
            
            return redirect()->route('cart')->with('success', 'Order created successfully.');
        } else {
            // If the user is not authenticated, redirect back with an error message
            return redirect()->route('cart')->with('error', 'User not authenticated.');
        }
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
    public function cancelOrderDetail($orderId)
    {
        // Get all order details associated with the order_id
        $orderDetails = OrderDetail::where('order_id', $orderId)->get();
    
        // Delete each order detail
        foreach ($orderDetails as $orderDetail) {
            $orderDetail->delete();
        }
    
        // Update the status of the order to 'canceled'
        $order = Order::findOrFail($orderId);
        $order->status = 'Đã hủy';
        $order->save();
    
        return redirect()->back()->with('success', 'Đơn hàng đã được hủy.');
    }
    public function cancelOrderDetailAll(Request $request){
        $user = auth::user();
        // Logic to cancel all orders for the authenticated user
        Order::where('user_id', $user->id)->delete();
        return redirect()->back()->with('success', 'Đơn hàng đã được hủy.');
    }
}
