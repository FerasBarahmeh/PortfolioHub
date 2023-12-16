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
        Schema::create('info_supplementary_admins', function (Blueprint $table) {
            $table->id();

            $table->foreignId('admin_id')
                ->references('id')
                ->on('admins')
                ->cascadeOnDelete();

            $table->string('job_title');
            $table->string('phone', 10);
            $table->date('BOD');
            $table->string('location', 30);
            $table->text('about');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_supplementary_admins');
    }
};
