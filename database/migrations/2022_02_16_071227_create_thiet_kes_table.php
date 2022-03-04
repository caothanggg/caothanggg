<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ThietKe;
class CreateThietKesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thietke', function (Blueprint $table) {
            $table->id();
            $table->string('tenthietke');
            $table->string('tenthietke_slug');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        ThietKe::create(['tenthietke'=>'Tràn Viền','tenthietke_slug'=>'tran-vien']);
        ThietKe::create(['tenthietke'=>'Mỏng Nhẹ','tenthietke_slug'=>'mong-nhe']);
        ThietKe::create(['tenthietke'=>'Nguyên Khối','tenthietke_slug'=>'nguyen-khoi']);
        ThietKe::create(['tenthietke'=>'Mặt Lưng Kính','tenthietke_slug'=>'mat-lung-kinh']);
        ThietKe::create(['tenthietke'=>'Pin Rời','tenthietke_slug'=>'pin-roi']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thietke');
    }
}
