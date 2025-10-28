<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->string('period')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->timestamps();
        });
        Schema::create('postulates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_member')->nullable();
            $table->bigInteger('id_service')->nullable();
            $table->bigInteger('id_vote')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
        Schema::create('run_vote', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_member')->nullable();
            $table->bigInteger('id_member_vote')->nullable();
            $table->bigInteger('id_service')->nullable();
            $table->bigInteger('id_vote')->nullable();
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
        Schema::dropIfExists('votes');
        Schema::dropIfExists('postulates');
        Schema::dropIfExists('run_vote');
    }
}
