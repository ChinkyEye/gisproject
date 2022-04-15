<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePratibedansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pratibedans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('path')->nullable();
            $table->string('document')->nullable();
            $table->string('description')->nullable();
            $table->integer('type');
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
        Schema::dropIfExists('pratibedans');
    }
}
