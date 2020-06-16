<?php

namespace App;

use \App\Db;

abstract class Model
{
    protected const TABLE = '';
    public int $id;

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE :id=id';
        $data = $db->query($sql, [':id' => $id], static::class);
        if (!empty($data)) {
            return $data[0];
        }
        return false;
    }

    public static function lastThree(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT 3';
        return $db->query($sql, [], static::class);
    }
}