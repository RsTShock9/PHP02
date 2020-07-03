<?php

namespace App;

use App\Exceptions\MultiExceptions;
use App\Exceptions\ValidationErrors;

abstract class Model
{
    protected const TABLE = '';
    public int $id;

    public function fill($data)
    {
        $errors = new MultiExceptions;

        foreach ($data as $name => $value) {
            try {
                if ('id' == $name) {
                    continue;
                }
                $methodName = 'validate' . ucfirst($name);
                if ($this->$methodName($value)) {
                    $this->$name = $value;
                }
            } catch (ValidationErrors $e) {
                $errors->addError($e);
            }
        }
        if (count($errors) > 0) {
            throw $errors;
        }
    }

    /**
     * @return array возвращает массив объектов класса
     */
    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id';
        return $db->query($sql, static::class);
    }

    /**
     * @param $id
     * @return object|mixed возвращает одну запись из таблицы
     */
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

    /**
     * @param int $limit
     * @return array возвращает массив объектов из заданного количества записей по полю id
     */
    public static function getLastRecords(int $limit): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $limit;
        return $db->query($sql, static::class);
    }

    /**
     * Вставляет запись в базу данных
     */
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
        $a = $db->execute($sql, $data);
        $this->id = $db->lastId();
    }

    /**
     * Обновляет запись в базе данных
     */
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

    /**
     * Удаляет запись в базе данных
     */
    public function delete()
    {
        $data = [':id' => $this->id];
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = new Db();
        $db->execute($sql, $data);
    }

    /**
     * Если есть данный id, метод обновит запись в базе данных, если нет - создаст новую
     */
    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }
}