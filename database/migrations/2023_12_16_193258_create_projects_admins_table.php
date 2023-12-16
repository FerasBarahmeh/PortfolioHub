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
        Schema::create('projects_admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')
                ->references('id')
                ->on('services_admins')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_admins');
    }
};
