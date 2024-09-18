<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function index(){
        return view('carts.index');
    }

    public function addCart(Request $request,$id){
        $product = Product::findOrFail($id);
        $cart = Session::get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                'name' => $product -> name,
                'quantity' => 1,
                'price' => $product -> price,
                'img' => $product -> image_url
            ];
        }
        Session::put('cart',$cart);
        return redirect()->back()->with('success','Product added to cart');
    }

    
}
