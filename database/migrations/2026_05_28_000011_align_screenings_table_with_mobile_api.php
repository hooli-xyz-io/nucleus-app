<?php

return new class {
    public function up(): void
    {
        $driver = \Core\Database\Connection::pdo()->getAttribute(\PDO::ATTR_DRIVER_NAME);

        $columnExists = static function (string $column) use ($driver): bool {
            if ($driver === 'sqlite') {
                $columns = \Core\Database\Connection::query('PRAGMA table_info(screenings)')->fetchAll();

                foreach ($columns as $definition) {
                    if (($definition['name'] ?? null) === $column) {
                        return true;
                    }
                }

                return false;
            }

            $statement = \Core\Database\Connection::query(
                "SHOW COLUMNS FROM screenings LIKE '" . $column . "'"
            );

            return $statement->fetch() !== false;
        };

        $addColumn = static function (string $column, string $definition) use ($columnExists): void {
            if ($columnExists($column)) {
                return;
            }

            \Core\Database\Connection::query(
                "ALTER TABLE screenings ADD COLUMN {$column} {$definition}"
            );
        };

        $addColumn('session_id', 'VARCHAR(255) NULL');
        $addColumn('screening_option', 'VARCHAR(255) NULL');
        $addColumn('screening_type', 'VARCHAR(255) NULL');
        $addColumn('age_range', 'VARCHAR(255) NULL');
        $addColumn('language_code', 'VARCHAR(255) NULL');
        $addColumn('status', 'VARCHAR(255) NULL');
        $addColumn('started_at', 'DATETIME NULL');
        $addColumn('completed_at', 'DATETIME NULL');
    }

    public function down(): void
    {
        // No-op. This framework does not provide a safe portable column drop helper.
    }
};
