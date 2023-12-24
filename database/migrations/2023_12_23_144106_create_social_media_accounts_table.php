<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('social_media_accounts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('admin_id')
                ->references('id')
                ->on('admins')
                ->cascadeOnDelete();

            $table->string('username_account');

            $table->boolean('active')
                ->default(true);

            $table->foreignId('domain_id')
                ->references('id')
                ->on('domains_social_media')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media_usernames');
    }
};
