<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accomplishment_id')->constrained('accomplishments')->onUpdate('cascade');
            $table->foreignId('office_member_id')->constrained('office_members')->onUpdate('cascade');
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
        Schema::dropIfExists('opcrs');
    }
}
