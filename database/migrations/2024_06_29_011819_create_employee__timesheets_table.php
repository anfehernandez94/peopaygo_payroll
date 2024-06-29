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
        Schema::create('employee__timesheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId("timesheet_id")->constrained();
            $table->foreignId("employee_id")->constrained();
            $table->float("hour_worked", 8, 2, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee__timesheets');
    }
};
