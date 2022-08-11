<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStratPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strat_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('key_function_id')->constrained('key_functions');
            $table->foreignId('sector_id')->constrained('sectors');
            $table->foreignId('task_id')->constrained('tasks');
            $table->foreignId('performance_measure_id')->constrained('performance_measures');
            $table->string('goal');
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
        Schema::dropIfExists('strat_plans');
    }
}
