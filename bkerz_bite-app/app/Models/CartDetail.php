<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartDetail extends Model
{
    protected $fillable = [
        'quantity',
        'cart_id', // Liên kết với bảng cart
        'product_id'
    ];

    // Thiết lập quan hệ với bảng Cart
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Mối quan hệ với bảng carts
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
    // Sự kiện khi thêm sản phẩm vào CartDetail
   
}