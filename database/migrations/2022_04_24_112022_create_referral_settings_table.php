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
        Schema::create('referral_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('duration')->default(7);
            $table->boolean('is_transfer_enabled')->default(true);
            $table->boolean('is_ticketing_enabled')->default(false);
            $table->boolean('is_eloading_enabled')->default(true);
            $table->boolean('is_bills_payment_enabled')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_settings');
    }
};
