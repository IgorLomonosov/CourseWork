<?php

namespace models;

use core\Core;
use core\Model;

/**
 * @property int $id Унікальний ідентифікатор новини
 * @property string $title Заголовок новини
 * @property string $text Повний вміст новини
 * @property string $short_text Короткий опис новини
 * @property string $date Дата створення новини
 */
class News extends Model
{
    public static $tableName = 'news';

    public function __construct()
    {

    }
}