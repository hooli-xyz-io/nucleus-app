<?php

use Core\Database\Schema;

return new class {
    public function up(): void
    {
        Schema::create('users', function ($table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('password');
            $table->boolean('accepted_terms');
            $table->timestamps();
        });

        Schema::create('api_tokens', function ($table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('token');
            $table->timestamp('last_used_at');
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('api_tokens');
    }
};