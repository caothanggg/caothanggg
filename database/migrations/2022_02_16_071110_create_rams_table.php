<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Ram;
class CreateRamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ram', function (Blueprint $table) {
            $table->id();
            $table->string('tenram');
            $table->string('tenram_slug');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
            
        });
        Ram::create(['tenram'=>'1GB','tenram_slug'=>'1gb']);
        Ram::create(['tenram'=>'2GB','tenram_slug'=>'2gb']);
        Ram::create(['tenram'=>'3GB','tenram_slug'=>'3gb']);
        Ram::create(['tenram'=>'4GB','tenram_slug'=>'4gb']);
        Ram::create(['tenram'=>'6GB','tenram_slug'=>'6gb']);
        Ram::create(['tenram'=>'8GB','tenram_slug'=>'8gb']);
        Ram::create(['tenram'=>'12GB','tenram_slug'=>'12gb']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ram');
    }
}
