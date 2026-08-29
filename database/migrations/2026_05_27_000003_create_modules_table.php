<?php

use Core\Database\Schema;

return new class {
    public function up(): void
    {
        Schema::create('modules', function ($table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('subject_id');
            $table->string('title');
            $table->string('image_url')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
