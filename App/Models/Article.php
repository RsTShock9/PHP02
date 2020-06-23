<?php

namespace App\Models;

use App\Model;

class Article extends Model
{
    public const TABLE = 'articles';

    public string $title;
    public string $content;
    public int $author_id;

    /**
     * @param string $name
     * @return Author|bool возвращает запись из таблицы authors по id, как объект класса Author
     */
    public function __get(string $name)
    {
        if (!empty($this->author_id) && ('author' == $name)) {
            return Author::findById($this->author_id);
        }
        return null;
    }

    /**
     * @param string $name
     * @return bool метод вызывается при использовании isset или empty на несуществующем свойстве
     * author, возвращает true или false
     */
    public function __isset(string $name): bool
    {
        if (!empty($this->author_id) && ('author' == $name)) {
            return true;
        }
        return false;
    }
}