<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailTable extends Migration
{
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamps(); // Tạo created_at và updated_at
            
            // Thêm foreign key nếu cần
            $table->foreignId('product_id')->nullable()->constrained('products', 'product_id')->onDelete('set null');
            $table->foreignId('cart_id')->nullable()->constrained('carts', 'id')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
