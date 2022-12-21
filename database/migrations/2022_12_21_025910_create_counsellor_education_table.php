<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounsellorEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counsellor_education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('counsellor_id');
            $table->foreign('counsellor_id')->references('id')->on('counsellors')->onDelete('cascade');
            $table->string('institution');
            $table->string('major');
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
        Schema::dropIfExists('counsellor_education');
    }
}
