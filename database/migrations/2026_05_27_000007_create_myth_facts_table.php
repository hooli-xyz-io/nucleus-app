<?php

use Core\Database\Schema;

return new class {
    public function up(): void
    {
        Schema::create('myth_facts', function ($table) {
            $table->id();
            $table->foreignId('lesson_id');
            $table->text('myth');
            $table->text('fact');
            $table->string('image_url')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('myth_facts');
    }
};
