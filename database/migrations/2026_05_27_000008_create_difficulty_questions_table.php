<?php

use Core\Database\Schema;

return new class {
    public function up(): void
    {
        Schema::create('difficulty_questions', function ($table) {
            $table->id();
            $table->foreignId('lesson_id');
            $table->string('question');
            $table->string('answer');
            $table->string('difficulty_level');
            $table->string('image_url')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('difficulty_questions');
    }
};
