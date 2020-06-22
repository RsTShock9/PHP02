<?php

namespace App;

class Db
{
    protected \PDO $dbh;

    public function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $data = $this->dbh = new \PDO('pgsql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'], $config['password']);

    }

    public function query($sql, $class, $data = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($query, $params = []) :bool
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute();
    }
}