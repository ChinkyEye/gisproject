<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidemenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidemenus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_np')->nullable();
            $table->string('model')->nullable();
            $table->string('link')->nullable();
            $table->integer('level')->default(1);
            $table->integer('link_type')->nullable();  // 1 for api link, 0 for normal 
            $table->string('page')->nullable();
            $table->integer('sort_id')->nullable();
            $table->boolean('is_active')->default(True); // 1 active, 0 non active
            $table->string('date_np',10);
            $table->string('date',10);
            $table->string('time',8);
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('sidemenus');
    }
}
