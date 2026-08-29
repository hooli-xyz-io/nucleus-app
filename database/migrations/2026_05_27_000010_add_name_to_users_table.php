<?php
/**
 * Migration: add name column to users table.
 */
return new class {
    public function up(): void
    {
// Add name column using raw SQL (Schema class not available)
        \Core\Database\Connection::query('ALTER TABLE users ADD COLUMN name TEXT NULL');
    }

    public function down(): void
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('name');
        });
    }
};
?>
