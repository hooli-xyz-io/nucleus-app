<?php

use Core\Database\Schema;

return new class {
    public function up(): void
    {
        Schema::create('quizzes', function ($table) {
            $table->id();
            $table->foreignId('lesson_id');
            $table->text('question');
            $table->string('image_url')->nullable();
            $table->string('answer_yes_text');
            $table->string('answer_no_text');
            $table->string('correct_answer');
            $table->text('explanation')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
