<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBioToCounsellorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('counsellors', function (Blueprint $table) {
            $table->after('email', function () use ($table) {
                $table->longText('bio')->nullable();
                $table->string('image')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('counsellors', function (Blueprint $table) {
            //
        });
    }
}
