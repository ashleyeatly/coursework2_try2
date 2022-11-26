<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('door_user', function (Blueprint $table) {
//            $table->id();
            $table->timestamps();
            $table->primary(['door_id', 'user_id']);
            $table->unsignedInteger('door_id');
            $table->unsignedInteger('user_id');

// the links between a user and doors
// delete a doors and any that doors is removed from the door_user pivot table
            $table->foreign('door_id')->references('id')->on('doors')->onDelete('cascade')->onUpdate('cascade');
// delete a user and any doors linked to that user is removed from the pivot table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('door_user');
    }
};
