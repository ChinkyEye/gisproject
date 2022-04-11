<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRemoteNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_remote_notices', function (Blueprint $table) {
            $table->id();
            $table->integer('remote_id'); // id of api table
            $table->string('server'); // define which api server
            $table->string('title'); // define which title
            $table->string('url'); // redirects which url it follow
            $table->string('date_np'); // to get nepali date
            $table->string('ministry')->nullable(); // to get nepali date
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
        Schema::dropIfExists('tbl_remote_notices');
    }
}
