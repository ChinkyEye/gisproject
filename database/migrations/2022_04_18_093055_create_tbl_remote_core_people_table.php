<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRemoteCorePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_remote_core_people', function (Blueprint $table) {
            $table->id();
            $table->integer('mantralaya_id'); // id of api table
            $table->string('server'); // id of api table
            $table->string('name'); 
            $table->string('image'); 
            $table->string('post'); 
            $table->string('url'); 
            $table->string('ministry'); 
            $table->string('phone')->nullable(); 
            $table->integer('is_top'); 
            $table->integer('is_start'); 
            $table->string('date_np')->nullable();
            $table->integer('sort_id')->nullable(); 
            $table->boolean('is_active')->default(true); // 1 active, 0 non active
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
        Schema::dropIfExists('tbl_remote_core_people');
    }
}
