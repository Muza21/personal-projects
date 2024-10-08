<?php

namespace laramz\mvcphp\DB;

use laramz\mvcphp\Application;
use PDO;

class Database
{
    public PDO $pdo;
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR . '/Migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            } else {
                require_once Application::$ROOT_DIR . '/Migrations/' . $migration;
                $className = pathinfo($migration, PATHINFO_FILENAME);
                $fullClassName = 'App\\Migrations\\' . $className;
                if (class_exists($fullClassName)) {
                    $instance = new $fullClassName();
                    $this->log("Applying migration $migration");
                    $instance->up();
                    $this->log("Applied migration $migration");
                    $newMigrations[] = $migration;
                } else {
                    $this->log("Class $fullClassName not found for migration $migration");
                }
            }
        }
        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log('All migrations are applied');
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
        ");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("select migration from migrations");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $str = implode(",", array_map(fn ($m) => "('$m')", $migrations));

        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $str
        ");

        $statement->execute();
    }

    protected function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . ']' . $message . PHP_EOL;
    }

    public function prepare($query)
    {
        return $this->pdo->prepare($query);
    }
}
