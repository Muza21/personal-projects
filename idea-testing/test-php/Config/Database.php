<?php
$envFile = base_path('.env');
$envVars = parse_ini_file($envFile);

return [
    'database' =>
    [
        'host' => $envVars['DB_HOST'],
        'port' => $envVars['DB_PORT'],
        'dbname' => $envVars['DB_NAME'],
        'charset' => 'utf8mb4',
        'user' => $envVars['DB_USERNAME'],
        'password' => $envVars['DB_PASSWORD']
    ]
];
