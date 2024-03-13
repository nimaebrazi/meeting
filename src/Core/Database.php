<?php

namespace Meeting\Core;

use PDO;

class Database
{
    private PDO $connection;
    private $stmt;

    public function __construct(array $config)
    {
        $username = $config['username'];
        $password = $config['password'];

        unset($config['username']);
        unset($config['password']);

        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }

    public function query(string $query, array $params = [])
    {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);

        return $this;
    }

    public function connection(): PDO
    {
        return $this->connection;
    }

}