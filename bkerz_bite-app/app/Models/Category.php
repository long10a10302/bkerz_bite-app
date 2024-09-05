<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';

    // Định nghĩa các trường có thể được gán hàng loạt
    protected $fillable = [
        'category_name',
        'description',
        'img_url',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}


