<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('phone',10)->nullable();
            $table->string('link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('path')->nullable();
            $table->string('mimes_type')->nullable();
            $table->string('document')->nullable();
            $table->string('responsibility')->nullable();
            $table->integer('type'); 
            $table->integer('is_top')->default(0); 
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
        Schema::dropIfExists('core_people');
    }
}
