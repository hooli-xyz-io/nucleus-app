<?php

use Core\Database\Schema;

return new class {
    public function up(): void
    {
        Schema::create('screenings', function ($table) {
            $table->id();
            $table->string('session_id')->unique();
            $table->string('screening_option');
            $table->string('screening_type');
            $table->string('gender');
            $table->string('age_range');
            $table->string('language_code');
            $table->string('status');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            // Flattened responses (up to 10)
            for ($i = 1; $i <= 10; $i++) {
                $table->text("question_$i")->nullable();
                $table->text("answer_$i")->nullable();
            }
            // Flattened outcomes (up to 10)
            for ($i = 1; $i <= 10; $i++) {
                $table->text("outcome_$i")->nullable();
            }
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('screenings');
    }
};
