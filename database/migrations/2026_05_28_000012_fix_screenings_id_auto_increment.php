<?php

return new class {
    public function up(): void
    {
        $driver = \Core\Database\Connection::pdo()->getAttribute(\PDO::ATTR_DRIVER_NAME);

        if ($driver !== 'mysql') {
            return;
        }

        $idColumn = \Core\Database\Connection::query(
            "SHOW COLUMNS FROM screenings LIKE 'id'"
        )->fetch();

        if (!$idColumn) {
            return;
        }

        $primaryKey = \Core\Database\Connection::query(
            "SHOW INDEX FROM screenings WHERE Key_name = 'PRIMARY'"
        )->fetch();

        $hasAutoIncrement = str_contains(strtolower((string) ($idColumn['Extra'] ?? '')), 'auto_increment');

        if (!$primaryKey && !$hasAutoIncrement) {
            \Core\Database\Connection::query(
                'ALTER TABLE screenings MODIFY id INT NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id)'
            );
            return;
        }

        if (!$primaryKey) {
            \Core\Database\Connection::query(
                'ALTER TABLE screenings ADD PRIMARY KEY (id)'
            );
        }

        if (!$hasAutoIncrement) {
            \Core\Database\Connection::query(
                'ALTER TABLE screenings MODIFY id INT NOT NULL AUTO_INCREMENT'
            );
        }
    }

    public function down(): void
    {
        // No-op. This framework does not provide a safe portable rollback for this change.
    }
};
