<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middle_name')->default(null);
            $table->string('last_name')->default(null);
            $table->string('gender')->default(null);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('job_title');
            $table->unsignedBigInteger('department');
            $table->string('reporting_manager');
            $table->string('phone_no')->default(null);
            $table->string('city')->default(null);
            $table->string('role')->default('0');
            $table->date('date_of_birth')->default(null);
            $table->string('profile_photo')->default('/storage/default.png');
            $table->foreign('department')->references('id')->on('departments');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
