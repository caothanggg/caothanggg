<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BoNhoTrong;
class CreateBoNhoTrongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonhotrong', function (Blueprint $table) {
            $table->id();
            $table->string('tenbonhotrong');
            $table->string('tenbonhotrong_slug');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        BoNhoTrong::create(['tenbonhotrong'=>'8MB','tenbonhotrong_slug'=>'8mb']);
        BoNhoTrong::create(['tenbonhotrong'=>'16MB','tenbonhotrong_slug'=>'16mb']);
        BoNhoTrong::create(['tenbonhotrong'=>'32MB','tenbonhotrong_slug'=>'32mb']);
        BoNhoTrong::create(['tenbonhotrong'=>'64MB','tenbonhotrong_slug'=>'64mb']);
        BoNhoTrong::create(['tenbonhotrong'=>'128MB','tenbonhotrong_slug'=>'128mb']);
        BoNhoTrong::create(['tenbonhotrong'=>'256MB','tenbonhotrong_slug'=>'256mb']);
        BoNhoTrong::create(['tenbonhotrong'=>'512MB','tenbonhotrong_slug'=>'512mb']);
        BoNhoTrong::create(['tenbonhotrong'=>'8GB','tenbonhotrong_slug'=>'8gb']);
        BoNhoTrong::create(['tenbonhotrong'=>'16GB','tenbonhotrong_slug'=>'16gb']);
        BoNhoTrong::create(['tenbonhotrong'=>'32GB','tenbonhotrong_slug'=>'32gb']);
        BoNhoTrong::create(['tenbonhotrong'=>'64GB','tenbonhotrong_slug'=>'64gb']);
        BoNhoTrong::create(['tenbonhotrong'=>'128GB','tenbonhotrong_slug'=>'128gb']);
        BoNhoTrong::create(['tenbonhotrong'=>'256GB','tenbonhotrong_slug'=>'256gb']);
        BoNhoTrong::create(['tenbonhotrong'=>'512GB','tenbonhotrong_slug'=>'512gb']);
        BoNhoTrong::create(['tenbonhotrong'=>'1TB','tenbonhotrong_slug'=>'1tb']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonhotrong');
    }
}
