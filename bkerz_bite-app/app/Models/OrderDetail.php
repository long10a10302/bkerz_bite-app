<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'order_id',
        'quantity', // Liên kết với bảng cart
        'product_id',
        'price'
    ];

    // Thiết lập quan hệ với bảng Cart
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Mối quan hệ với bảng carts
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
