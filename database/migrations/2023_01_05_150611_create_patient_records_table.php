<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::disableForeignKeyConstraints();
        Schema::create('patient_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('counsellor_id');
            $table->unsignedBigInteger('counselling_id');
            $table->string('issues')->nullable();
            $table->string('counsellor_name')->nullable();
            $table->string('client_name')->nullable();
            $table->string('counselling_date')->nullable();
            $table->string('session')->nullable();
            $table->string('consultation_package')->nullable();
            $table->string('client_birthdate')->nullable();
            $table->string('client_address')->nullable();
            $table->string('informed_consent')->nullable();
            $table->string('is_sex_harassment')->nullable();
            $table->string('is_client_agree')->nullable();
            $table->string('referred_to')->nullable();
            $table->string('referred_reason')->nullable();
            $table->string('complaint')->nullable();
            $table->string('assessment_method')->nullable();
            $table->string('assessment_result')->nullable();
            $table->string('client_data')->nullable();
            $table->string('psychologist_history')->nullable();
            $table->string('medical_history')->nullable();
            $table->string('client_history')->nullable();
            $table->string('law_history')->nullable();
            $table->string('traumatic_history')->nullable();
            $table->string('observation_result')->nullable();
            $table->string('psychological_symptoms')->nullable();
            $table->string('symptoms_management')->nullable();
            $table->string('assessment_risk')->nullable();
            $table->string('suicide_thinking')->nullable();
            $table->string('suicide_attempt')->nullable();
            $table->string('another_risk')->nullable();
            $table->string('need_referred')->nullable();
            $table->string('conclusion')->nullable();
            $table->string('treatment_recommend')->nullable();
            $table->string('session_obstacle')->nullable();
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
        Schema::dropIfExists('patient_records');
    }
}
