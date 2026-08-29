<?php

use Core\Database\Schema;

return new class {
    public function up(): void
    {
        Schema::create('lessons', function ($table) {
            $table->id();
            $table->foreignId('module_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
