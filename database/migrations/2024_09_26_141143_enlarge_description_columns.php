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
        Schema::table('communication_products', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });

        Schema::table('evidence_attachments', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
