<?php

namespace App\Classes;

use App\Exceptions\DbException;

class Db
{
    protected \PDO $dbh;

    public function __construct()
    {
        $config = Config::instance();
        try {
            $this->dbh = new \PDO('pgsql:host=' . $config->data['db']['host'] . ';dbname=' .
                $config->data['db']['dbname'], $config->data['db']['user'], $config->data['db']['password']);
        } catch (\PDOException $ex) {
            throw new DbException($ex->getMessage(), $ex->getCode());
        }
    }

    public function query($sql, $class, $data = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        $result = $sth->execute($data);
        if ($result == false) {
            throw new DbException('Ошибка запроса ' . $sql);
        }
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
