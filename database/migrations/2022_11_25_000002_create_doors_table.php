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
        Schema::create('doors', function (Blueprint $table) {
//            $table->id();
//            $table->timestamps();
            $table->increments('id');
            $table->string('name')->unique(); // Note we want to force unique names.
            // a doors can only belong to at most one zone
            // So create zones first and then add doors to zone
            $table->unsignedInteger('zone_id')->nullable();
            $table->timestamps();
            // and then add the fact that zone_id is linked to zones table via the zones id
            // and then cascade etc.
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doors');
    }
};
