<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_np')->nullable();
            $table->string('model')->nullable();
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('model_has_types');
            $table->string('link')->nullable();
            $table->integer('is_main')->default(0);
            $table->string('page')->nullable();
            $table->integer('parent_id')->default('0');
            $table->integer('sort_id')->nullable();
            $table->boolean('is_active')->default(true); // 1 active, 0 non active
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
        Schema::dropIfExists('menus');
    }
}
