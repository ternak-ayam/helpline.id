<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounsellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('counsellings', function (Blueprint $table) {
            $table->id();
            $table->string('counselling_id');

            $table->unsignedBigInteger('counsellor_id');
            $table->foreign('counsellor_id')->references('id')->on('counsellors');

            $table->unsignedBigInteger('translator_id')->nullable();
            $table->foreign('translator_id')->references('id')->on('translators');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->dateTime('due');
            $table->string('counselling_method');
            $table->string('chat_url');
            $table->boolean('is_need_translator')->default(false);
            $table->string('translator_language')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('counsellings');
    }
}
