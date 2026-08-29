<?php

use Core\Database\Connection;

return new class {
    public function up(): void
    {
        $driver = Connection::pdo()->getAttribute(\PDO::ATTR_DRIVER_NAME);

        $columnExists = static function (string $column) use ($driver): bool {
            if ($driver === 'sqlite') {
                foreach (Connection::query('PRAGMA table_info(screenings)')->fetchAll() as $definition) {
                    if (($definition['name'] ?? null) === $column) {
                        return true;
                    }
                }
                return false;
            }

            return Connection::query(
                "SHOW COLUMNS FROM screenings LIKE '" . $column . "'"
            )->fetch() !== false;
        };

        $definitions = [
            'session_id' => 'VARCHAR(64) NULL',
            'screening_option' => 'VARCHAR(32) NULL',
            'screening_type' => 'VARCHAR(32) NULL',
            'age_range' => 'VARCHAR(32) NULL',
            'language_code' => 'VARCHAR(8) NULL',
            'status' => 'VARCHAR(32) NULL',
            'started_at' => 'DATETIME NULL',
            'completed_at' => 'DATETIME NULL',
            'updated_at' => 'DATETIME NULL',
            'responses' => 'LONGTEXT NULL',
            'outcomes' => 'LONGTEXT NULL',
            'total_score' => 'INT NULL',
            'score_outcome' => 'VARCHAR(128) NULL',
        ];

        foreach ($definitions as $column => $definition) {
            if (!$columnExists($column)) {
                Connection::query(
                    "ALTER TABLE screenings ADD COLUMN {$column} {$definition}"
                );
            }
        }
    }

    public function down(): void
    {
        // Intentionally non-destructive. Screening evidence must not be removed
        // automatically by rolling back application code.
    }
};
