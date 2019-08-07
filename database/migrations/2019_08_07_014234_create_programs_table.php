<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('partner_id');
            $table->string('code');
            $table->string('active');
            $table->string('name');
            $table->string('full_name');
            $table->string('partner');
            $table->string('strategy');
            $table->string('ltv');
            $table->integer('bu');
            $table->string('location');
            $table->string('vertical');
            $table->string('subvertical');
            $table->string('type');
            $table->string('level');
            $table->string('priority');
            $table->string('concentrations');
            $table->string('tracks');
            $table->string('accreditation');
            $table->string('online_percent');
            $table->integer('start_year');
            $table->integer('start_month');
            $table->integer('entry_points');
            $table->date('renewal_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
