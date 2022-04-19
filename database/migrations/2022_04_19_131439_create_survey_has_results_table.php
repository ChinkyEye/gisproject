<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyHasResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_has_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surveyform_has_user_id');
            $table->foreign('surveyform_has_user_id')->references('id')->on('survey_form_has_users'); 
            $table->unsignedBigInteger('surveyform_has_attr_id');
            $table->foreign('surveyform_has_attr_id')->references('id')->on('survey_form_has_attributes');
            $table->text('result');
            $table->string('type')->nullable();
            $table->integer('sort_id')->nullable();
            $table->boolean('is_active')->default(True); // 1 active, 0 non active
            $table->string('date_np',10);
            $table->string('date',10);
            $table->string('time',8);
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
        Schema::dropIfExists('survey_has_results');
    }
}
