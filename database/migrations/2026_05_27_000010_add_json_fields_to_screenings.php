<?php

use Core\Database\Schema;

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

        if (!$columnExists('responses')) {
            \Core\Database\Connection::query('ALTER TABLE screenings ADD COLUMN responses TEXT NULL');
        }

        if (!$columnExists('outcomes')) {
            \Core\Database\Connection::query('ALTER TABLE screenings ADD COLUMN outcomes TEXT NULL');
        }

        $rows = \Core\Database\Connection::query(
            'SELECT id, question_1, answer_1, question_2, answer_2, question_3, answer_3, question_4, answer_4, question_5, answer_5, question_6, answer_6, question_7, answer_7, question_8, answer_8, question_9, answer_9, question_10, answer_10 FROM screenings WHERE responses IS NULL OR outcomes IS NULL'
        );

        while ($row = $rows->fetch()) {
            $responses = [];

            for ($i = 1; $i <= 10; $i++) {
                $question = $row["question_$i"] ?? null;
                $answer = $row["answer_$i"] ?? null;

                if ($question !== null || $answer !== null) {
                    $responses[] = ['question' => $question, 'answer' => $answer];
                }
            }

            \Core\Database\Connection::query(
                'UPDATE screenings SET responses = ?, outcomes = ? WHERE id = ?',
                [json_encode($responses), json_encode([]), $row['id']]
            );
        }
    }

    public function down(): void
    {
        // Re-add the flattened columns
        Schema::table('screenings', function ($table) {
            for ($i = 1; $i <= 10; $i++) {
                $table->text("question_$i")->nullable();
                $table->text("answer_$i")->nullable();
                $table->text("outcome_$i")->nullable();
            }
            $table->dropColumn('responses');
            $table->dropColumn('outcomes');
        });
    }
};
