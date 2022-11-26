<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('user_zone', function (Blueprint $table) {
//            $table->id();
            $table->primary(['user_id', 'zone_id']);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('zone_id');

// the links between user and zone
// delete a user and the links between user and zones is removed from pivot table
// delete a zone and any user linked to that doors in pivot table is removed too

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade')->onUpdate('cascade');



            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_zone');
    }
};
