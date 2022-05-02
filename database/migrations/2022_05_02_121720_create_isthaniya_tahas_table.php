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
            $table->string('metropolitan')->nullable();           
            $table->string('sub_metropolitan')->nullable();           
            $table->string('municipalities ')->nullable();           
            $table->string('rural_municipalities')->nullable();           
            $table->string('forest_area')->nullable();           
            $table->string('population')->nullable();           
            $table->string('agricultural_land')->nullable();           
            $table->string('tourists_site')->nullable();           
            $table->string('electricity_dev')->nullable();           
            $table->string('district')->nullable();           
            $table->string('wada')->nullable();           
            $table->string('industries')->nullable();           
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
