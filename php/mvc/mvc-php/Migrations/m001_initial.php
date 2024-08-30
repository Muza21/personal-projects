<?php

namespace App\Migrations;

use laramz\mvcphp\Application;

class m001_initial
{
    public function up()
    {
        $db = Application::$app->db;
        $query = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            status VARCHAR(255) NOT NULL DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE users;";
        $db->pdo->exec($query);
    }
}
