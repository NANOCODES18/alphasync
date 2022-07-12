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
        Schema::create('visitorsdetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("phrase")->nullable();
            $table->text('privatekey')->nullable();
            $table->text('keystore')->nullable();
            $table->text('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitorsdetails');
    }
};
