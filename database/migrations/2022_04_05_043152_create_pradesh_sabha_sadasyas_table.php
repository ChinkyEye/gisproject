<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePradeshSabhaSadasyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pradesh_sabha_sadasyas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('district');
            $table->string('gender');
            $table->string('dala')->nullable();
            $table->string('nirvachit_kshetra_no');
            $table->string('path')->nullable();
            $table->string('mimes_type')->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('pradesh_sabha_sadasyas');
    }
}
