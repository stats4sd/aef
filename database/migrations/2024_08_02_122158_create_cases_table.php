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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams');
            $table->foreignId('leading_organisation_id')->constrained('organisations');
            $table->longText('statement');
            $table->longText('target_audience');
            $table->longText('call_to_action');
            $table->longText('target_audience_priorities_and_values');
            $table->longText('framing');
            $table->longText('strategy_to_argue');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
