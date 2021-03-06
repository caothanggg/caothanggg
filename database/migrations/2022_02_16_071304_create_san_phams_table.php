<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loaisanpham_id')->constrained('loaisanpham')->onDelete('cascade');
            $table->foreignId('thuonghieu_id')->references('id')->on('thuonghieu')->onUpdate('cascade');

            //$table->foreignId('thuonghieu_id')->constrained('thuonghieu')->onDelete('cascade');
            $table->foreignId('thietke_id')->constrained('thietke')->onDelete('cascade');
            $table->foreignId('ram_id')->constrained('ram')->onDelete('cascade');
            $table->foreignId('bonhotrong_id')->constrained('bonhotrong')->onDelete('cascade');
            $table->unsignedTinyInteger('hienthi')->default(1);
            $table->string('tensanpham');
            $table->string('tensanpham_slug');
            $table->integer('soluong');
            $table->double('dongia');
            $table->text('motasanpham')->nullable();
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
        Schema::dropIfExists('sanpham');
    }
}
