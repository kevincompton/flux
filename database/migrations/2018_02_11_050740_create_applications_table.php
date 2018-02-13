<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('dl_no');
            $table->string('dl_state');
            $table->integer('dependencies');
            $table->integer('years_at_address');
            $table->string('owner_status');
            $table->string('prev_address');
            $table->string('prev_city');
            $table->string('prev_state');
            $table->integer('prev_zip');
            $table->string('employer_name');
            $table->integer('employer_phone');
            $table->integer('employer_years');
            $table->string('position');
            $table->string('employer_address');
            $table->string('employer_city');
            $table->string('employer_state');
            $table->integer('employer_zip');
            $table->string('cosigner_dl_no');
            $table->string('cosigner_dl_state');
            $table->integer('cosigner_dependencies');
            $table->integer('cosigner_years_at_address');
            $table->string('cosigner_prev_address');
            $table->string('cosigner_prev_city');
            $table->string('cosigner_prev_state');
            $table->integer('cosigner_prev_zip');
            $table->string('cosigner_employer_name');
            $table->integer('cosigner_employer_phone');
            $table->integer('cosigner_employer_years');
            $table->string('cosigner_position');
            $table->integer('cosigner_income');
            $table->integer('cosigner_mortgage');
            $table->string('cosigner_owner_status');
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
        Schema::dropIfExists('applications');
    }
}
