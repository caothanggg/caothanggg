<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamyeuthichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphamyeuthich', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sanpham_id')->constrained('sanpham')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphamyeuthich');
    }
}
