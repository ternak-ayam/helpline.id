<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounsellorScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('counsellor_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('counsellor_id');
            $table->foreign('counsellor_id')->references('id')->on('counsellors');

            $table->unsignedBigInteger('counselling_id');
            $table->foreign('counselling_id')->references('id')->on('counsellings');

            $table->date('date');
            $table->time('time');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counsellor_schedule');
    }
}
