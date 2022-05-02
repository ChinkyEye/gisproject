<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsthaniyaTahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isthaniya_tahas', function (Blueprint $table) {
            $table->id();            
            $table->integer('metropolitan')->nullable();           
            $table->integer('sub_metropolitan')->nullable();           
            $table->integer('municipalities')->nullable();           
            $table->integer('rural_municipalities')->nullable();           
            $table->integer('forest_area')->nullable();           
            $table->integer('population')->nullable();           
            $table->integer('agricultural_land')->nullable();           
            $table->integer('tourists_site')->nullable();           
            $table->integer('electricity_dev')->nullable();           
            $table->integer('district')->nullable();           
            $table->integer('wada')->nullable();           
            $table->integer('industries')->nullable();           
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
        Schema::dropIfExists('isthaniya_tahas');
    }
}
