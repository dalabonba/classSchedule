<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->id();

            $table->string('class_name',20)->nullable()->default('課程名稱');
            $table->string('professor',30)->nullable()->default('教授名稱');
            $table->string('classroom',20)->nullable()->default('教室位置');
            $table->string('homework')->nullable()->default('作業內容');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
