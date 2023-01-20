<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimesToCounsellorAvailableTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('counsellor_available_times', function (Blueprint $table) {
            $table->longText('start_at')->nullable()->after('day');
            $table->longText('end_at')->nullable()->after('start_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('counsellor_available_times', function (Blueprint $table) {
            //
        });
    }
}
