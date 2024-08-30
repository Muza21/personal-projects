<?php
$envFile = __DIR__ . '/../../.env';
$envVars = parse_ini_file($envFile);

return [
    'database' =>
        [
            'host' => $envVars['DB_HOST'],
            'port' => $envVars['DB_PORT'],
            'dbname' => $envVars['DB_NAME'],
            'charset' => 'utf8mb4'
        ],
    'user' =>
        [
            'name' => $envVars['DB_USERNAME'],
            'password' => $envVars['DB_PASSWORD']
        ]
];
