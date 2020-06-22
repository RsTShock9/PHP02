<?php

namespace App;

abstract class Model
{
    protected const TABLE = '';
    public int $id;

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql,static::class);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE :id=id';
        $data = $db->query($sql, static::class, [':id' => $id]);
        if (!empty($data)) {
            return $data[0];
        }
        return false;
    }

    public static function getLastRecords(int $limit): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $limit;
        return $db->query($sql, static::class);
    }
}