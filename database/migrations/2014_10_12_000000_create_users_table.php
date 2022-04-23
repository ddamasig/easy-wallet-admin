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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 56);
            $table->string('middle_name', 56)->nullable();
            $table->string('last_name', 56);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile_number')->unique();
            $table->string('password');
            $table->string('pin');
            $table->string('user_type')->default('staff');
            $table->date('birthdate')->nullable();
            $table->text('address')->nullable();
            $table->string('avatar', 128)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
};
