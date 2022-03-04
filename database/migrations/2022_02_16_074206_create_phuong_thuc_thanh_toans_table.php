<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PhuongThucThanhToan;
class CreatePhuongThucThanhToansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuongthucthanhtoan', function (Blueprint $table) {
            $table->id();
            $table->string('tenphuongthucthanhtoan');
            $table->string('tenphuongthucthanhtoan_slug');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';

        });
        PhuongThucThanhToan::create(['tenphuongthucthanhtoan'=>'Thanh Toán Khi Nhận Hàng','tenphuongthucthanhtoan_slug'=>'thanh-toan-khi-nhan-hang']);
        PhuongThucThanhToan::create(['tenphuongthucthanhtoan'=>'Thanh Toán Qua Thẻ Tín Dụng Và Thẻ Ghi Nợ','tenphuongthucthanhtoan_slug'=>'thanh-toan-qua-the-tin-dung-va-the-ghi-no']);
        PhuongThucThanhToan::create(['tenphuongthucthanhtoan'=>'Thanh Toán Bằng ATM Nội Địa','tenphuongthucthanhtoan_slug'=>'thanh-toan-bang-atm-noi-dia']);
        PhuongThucThanhToan::create(['tenphuongthucthanhtoan'=>'Thanh Toán Chuyển Trực Tiếp Vào Tài Khoản Người Bán','tenphuongthucthanhtoan_slug'=>'thanh-toan-truc-tiep-vao-tai-khoan-nguoi-ban']);
        PhuongThucThanhToan::create(['tenphuongthucthanhtoan'=>'Thanh Toán Trực Tiếp Bằng Tiền Mặt Tại Cửa Hàng','tenphuongthucthanhtoan_slug'=>'thanh-toan-truc-tiep-bang-tien-mat-tai-cua-hang']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phuongthucthanhtoan');
    }
}
