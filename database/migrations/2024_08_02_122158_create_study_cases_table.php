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
        Schema::create('study_cases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams');
            $table->foreignId('leading_organisation_id')->constrained('organisations')->nullable();;
            $table->longText('statement')->nullable();;
            $table->longText('target_audience')->nullable();;
            $table->longText('call_to_action')->nullable();;
            $table->longText('target_audience_priorities_and_values')->nullable();;
            $table->longText('framing')->nullable();;
            $table->longText('strategy_to_argue')->nullable();;
            $table->text('note')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_cases');
    }
};