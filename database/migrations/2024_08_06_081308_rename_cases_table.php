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
        // Rename table name from "cases" to "study_cases".
        // This is to avoid having a model name "Case", which is a PHP reserved word.
        Schema::rename('cases', 'study_cases');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('study_cases', 'cases');
    }
};
