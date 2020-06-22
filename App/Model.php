<?php

namespace App;

abstract class Model
{
    protected const TABLE = '';
    public int $id;

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id';
        return $db->query($sql, static::class);
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

    public function insert()
    {
        $props = get_object_vars($this);
        $columns = [];
        $bindings = [];
        $data = [];
        foreach ($props as $name => $value) {
            $columns[] = $name;
            $bindings[] = ':' . $name;
            $data[':' . $name] = $value;
        }
        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(',', $columns) . ') 
        VALUES (' . implode(',', $bindings) . ')';
        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->lastId();
    }

    public function update()
    {
        $props = get_object_vars($this);
        $columns = [];
        $data = [];
        foreach ($props as $name => $value) {
            $data[':' . $name] = $value;
            if ('id' == $name) {
                continue;
            }
            $columns[] = $name . '=:' . $name;
        }
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $columns) . ' WHERE id=:id';
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function delete()
    {
        $data = [':id' => $this->id];
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }
}