<?php

use Core\Database\Schema;

return new class {
    public function up(): void
    {
        Schema::create('slides', function ($table) {
            $table->id();
            $table->foreignId('lesson_id');
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->integer('position');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
