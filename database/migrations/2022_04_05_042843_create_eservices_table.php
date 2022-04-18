<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eservices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('karyalaya');
            $table->string('contact')->nullable();
            $table->string('thumbnail')->nullable();        
            $table->string('logo')->nullable();
            $table->string('paththumbnail')->nullable();        
            $table->string('pathlogo')->nullable();
            $table->string('mimes_type')->nullable();
            $table->text('website_link')->nullable();         
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
        Schema::dropIfExists('eservices');
    }
}
