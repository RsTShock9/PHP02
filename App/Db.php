<?php

namespace App;

class Db
{
    protected \PDO $dbh;

    public function __construct()
    {
        $config = Config::instance();
        $this->dbh = new \PDO('pgsql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'],
            $config->data['db']['user'], $config->data['db']['password']);
    }

    public function query($sql, $class, $data = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($query, $params = []): bool
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

    public function lastId(): string
    {
        return $this->dbh->lastInsertId();
    }
}