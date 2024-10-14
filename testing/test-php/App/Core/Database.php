<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    public $statement;
    public PDO $connection;

    public function __construct(array $config)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->connection = new PDO($dsn, options: [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
