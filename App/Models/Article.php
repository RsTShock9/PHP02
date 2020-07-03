<?php

namespace App\Models;

use App\Exceptions\ValidationErrors;
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

    public function validateTitle($title)
    {
        if (strlen($title) > 100) {
            throw new ValidationErrors('Заголовок должен быть не более 100 символов');
        }
        if (empty($title)) {
            throw new ValidationErrors('Заголовок не должен быть пустым');
        }
        if (!ctype_upper($title)) {
            throw new ValidationErrors('Заголовок должен начинаться с большой буквы');
        }
        return $title;
    }

    public function validateContent($content)
    {
        if (empty($content)) {
            throw new ValidationErrors('Текст статьи не должен быть пустым');
        }
        return $content;
    }

    public function validateAuthor_id($author_id)
    {
        if (!ctype_digit($author_id)) {
            throw new ValidationErrors('id автора должно быть числом');
        }
        return $author_id;
    }
}