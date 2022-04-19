<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyFormHasAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_form_has_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->unsignedBigInteger('form_id');
            $table->foreign('form_id')->references('id')->on('survey_forms');
            $table->boolean('is_required')->default(0);
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
            $table->string('type');
            $table->string('type_mimes')->nullable();
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
        Schema::dropIfExists('survey_form_has_attributes');
    }
}
