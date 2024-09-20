<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->comment('For identifying guest users');
            $table->unsignedBigInteger('user_id')->nullable(); // Cho phép null
            $table->timestamps(); // Tạo created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
