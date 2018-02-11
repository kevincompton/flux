<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullablePrevAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('applications', function (Blueprint $table) {
            $table->string('prev_address')->change()->nullable();
            $table->string('prev_city')->change()->nullable();
            $table->string('prev_state')->change()->nullable();
            $table->integer('prev_zip')->change()->nullable();
            $table->string('cosigner_prev_address')->change()->nullable();
            $table->string('cosigner_prev_city')->change()->nullable();
            $table->string('cosigner_prev_state')->change()->nullable();
            $table->integer('cosigner_prev_zip')->change()->nullable();
            $table->string('cosigner_dl_no')->change()->nullable();
            $table->string('cosigner_dl_state')->change()->nullable();
            $table->integer('cosigner_dependencies')->change()->nullable();
            $table->integer('cosigner_years_at_address')->change()->nullable();
            $table->string('cosigner_employer_name')->change()->nullable();
            $table->integer('cosigner_employer_phone')->change()->nullable();
            $table->integer('cosigner_employer_years')->change()->nullable();
            $table->string('cosigner_position')->change()->nullable();
            $table->integer('cosigner_income')->change()->nullable();
            $table->integer('cosigner_mortgage')->change()->nullable();
            $table->string('cosigner_owner_status')->change()->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
