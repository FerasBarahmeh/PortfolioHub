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
        Schema::create('experience_translations', function (Blueprint $table) {
            $table->id();

            $table->string('career_title');
            $table->string('name_organisation');
            $table->string('job_description');

            $table->string('locale')->index();
            $table->unique(['experience_id','locale']);
            $table->foreignId('experience_id')
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_translations');
    }
};
