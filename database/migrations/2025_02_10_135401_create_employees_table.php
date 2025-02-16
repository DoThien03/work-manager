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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code');
            $table->string('emp_name');
            $table->date('emp_dob');
            $table->string('password');
            $table->string('emp_email')->unique();
            $table->string('emp_position');
            $table->string('emp_level');
            $table->date('emp_join_date');
            $table->integer('emp_annual_leave_days');
            $table->integer('emp_remaining_leave_days');
            $table->unsignedBigInteger('dept_id');
            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('emp_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
