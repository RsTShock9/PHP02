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
            $e = new DbException('Нет соединения с базой данных');
            Logger::instance()->emergency($e);
            throw $e;
        }
    }

    public function query($sql, $class, $data = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if ($result == false) {
            $e = new DbException('Ошибка при выполнении запроса ' . $sql);
            Logger::instance()->emergency($e);
            throw $e;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function queryEach($sql, $class, $data = []): iterable
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if ($result == false) {
            $e = new DbException('Ошибка при выполнении запроса ' . $sql);
            Logger::instance()->emergency($e);
            throw $e;
        }
        $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        while ($row = $sth->fetch()) {
            yield $row;
        }
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
