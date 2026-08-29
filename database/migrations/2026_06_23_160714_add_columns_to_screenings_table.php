<?php

use Core\Database\Migration;
use Core\Database\Connection;

return new class extends Migration
{
    public function up(): void
    {
        $driver = Connection::pdo()->getAttribute(\PDO::ATTR_DRIVER_NAME);

        $columnExists = static function (string $column) use ($driver): bool {
            if ($driver === 'sqlite') {
                $columns = Connection::query('PRAGMA table_info(screenings)')->fetchAll();

                foreach ($columns as $definition) {
                    if (($definition['name'] ?? null) === $column) {
                        return true;
                    }
                }

                return false;
            }

            $statement = Connection::query(
                "SHOW COLUMNS FROM screenings LIKE '" . $column . "'"
            );

            return $statement->fetch() !== false;
        };

        $addColumn = static function (string $column, string $definition) use ($columnExists): void {
            if ($columnExists($column)) {
                return;
            }

            Connection::query(
                "ALTER TABLE screenings ADD COLUMN {$column} {$definition}"
            );
        };

        $addColumn('screening_option', 'VARCHAR(50) NULL');
        $addColumn('screening_type', 'VARCHAR(50) NULL');
        $addColumn('age_range', 'VARCHAR(50) NULL');
        $addColumn('language_code', 'VARCHAR(10) NULL');
        $addColumn('session_id', 'VARCHAR(100) NULL');
        $addColumn('status', 'VARCHAR(50) NULL');
        $addColumn('started_at', 'DATETIME NULL');
        $addColumn('completed_at', 'DATETIME NULL');
        $addColumn('responses', 'LONGTEXT NULL');
        $addColumn('outcomes', 'LONGTEXT NULL');
        $addColumn('total_score', 'INT NULL');
        $addColumn('score_outcome', 'VARCHAR(50) NULL');
    }

    public function down(): void
    {
        // No-op. Column drops are intentionally avoided because the project does
        // not have a portable drop-column helper across supported drivers.
    }
};
