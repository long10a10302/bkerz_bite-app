<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    // Định nghĩa các trường có thể được gán hàng loạt
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function cartItems()
    {
        return $this->hasMany(CartDetail::class);
    }
   
}
