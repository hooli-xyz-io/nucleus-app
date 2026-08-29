<?php

use Core\Database\Schema;

return new class {
    public function up(): void
    {
        Schema::create('languages', function ($table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
