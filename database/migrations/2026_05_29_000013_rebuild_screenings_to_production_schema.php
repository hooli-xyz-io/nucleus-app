<?php

use Core\Database\Connection;

return new class {
    public function up(): void
    {
        Connection::query('DROP TABLE IF EXISTS screenings');

        Connection::query('
            CREATE TABLE screenings (
                id            INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                created_at    VARCHAR(29) NULL,
                user_id       VARCHAR(36) NULL,
                name          VARCHAR(34) NULL,
                role          VARCHAR(4)  NULL,
                gender        VARCHAR(6)  NULL,
                province      VARCHAR(27) NULL,
                district      VARCHAR(11) NULL,
                health_facility VARCHAR(52) NULL,
                sex           VARCHAR(6)  NULL,
                age           VARCHAR(6)  NULL,
                question_1    VARCHAR(57) NULL,
                question_2    VARCHAR(51) NULL,
                question_3    VARCHAR(53) NULL,
                question_4    VARCHAR(62) NULL,
                question_5    VARCHAR(150) NULL,
                question_6    VARCHAR(122) NULL,
                question_7    VARCHAR(99) NULL,
                question_8    VARCHAR(99) NULL,
                question_9    VARCHAR(85) NULL,
                question_10   VARCHAR(90) NULL,
                answer_1      VARCHAR(60) NULL,
                answer_2      VARCHAR(48) NULL,
                answer_3      VARCHAR(35) NULL,
                answer_4      VARCHAR(11) NULL,
                answer_5      VARCHAR(42) NULL,
                answer_6      VARCHAR(42) NULL,
                answer_7      VARCHAR(11) NULL,
                answer_8      VARCHAR(11) NULL,
                answer_9      VARCHAR(11) NULL,
                answer_10     VARCHAR(11) NULL,
                organisation  VARCHAR(30) NULL,
                project_id    VARCHAR(30) NULL,
                type          VARCHAR(30) NULL,
                country       VARCHAR(30) NULL
            ) COLLATE=utf8mb4_general_ci
        ');
    }

    public function down(): void
    {
        Connection::query('DROP TABLE IF EXISTS screenings');
    }
};
