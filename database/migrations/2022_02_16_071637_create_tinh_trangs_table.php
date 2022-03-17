<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TinhTrang;

class CreateTinhTrangsTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinhtrang', function (Blueprint $table) {
            $table->id();
            $table->string('tentinhtrang');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });

        TinhTrang::create(['tentinhtrang' => 'Mới']);
        TinhTrang::create(['tentinhtrang' => 'Đang xác nhận / Đã xác nhận']);
        TinhTrang::create(['tentinhtrang' => 'Đã hủy']);
        TinhTrang::create(['tentinhtrang' => 'Đang đóng gói sản phẩm']);
        TinhTrang::create(['tentinhtrang' => 'Chờ đi nhận / Đang đi nhận / Đã nhận hàng ']);
        TinhTrang::create(['tentinhtrang' => 'Đang chuyển']);
        TinhTrang::create(['tentinhtrang' => 'Thất bại']);
        TinhTrang::create(['tentinhtrang' => 'Đang chuyển hoàn']);
        TinhTrang::create(['tentinhtrang' => 'Đã chuyển hoàn ']);
        TinhTrang::create(['tentinhtrang' => 'Thành công']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tinhtrang');
    }
}
