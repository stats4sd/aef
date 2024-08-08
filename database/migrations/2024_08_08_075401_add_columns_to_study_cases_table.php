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
        Schema::table('study_cases', function (Blueprint $table) {
            $table->integer('year_of_development')->nullable()->after('leading_organisation_id');
            $table->boolean('ready_for_review')->nullable()->after('note')->default(0);
            $table->boolean('reviewed')->nullable()->after('ready_for_review')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('study_cases', function (Blueprint $table) {
            //
        });
    }
};
