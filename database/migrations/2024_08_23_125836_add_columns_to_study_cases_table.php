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
            $table->string('other_languages')->nullable()->after('year_of_development');
            $table->string('contact_person_name')->nullable()->after('other_languages');
            $table->string('contact_person_email')->nullable()->after('contact_person_name');
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
