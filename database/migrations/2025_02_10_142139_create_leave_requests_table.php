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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->date('leave_start_date');
            $table->date('leave_end_date');
            $table->integer('leave_hours');
            $table->string('leave_type');
            $table->string('leave_reason');
            $table->string('leave_status');
            $table->date('leave_approved_date');
            $table->string('leave_confirm_reason');
            $table->string('leave_accept_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
