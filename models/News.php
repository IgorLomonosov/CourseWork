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

    public static function getDate($news): string
    {
        $dateTime = $news['date'];
        $dateTime = explode(' ', $dateTime);
        $date = $dateTime[0];
        $date = explode('-',$date);
        $date = array_reverse($date);
        return implode('.',$date);
    }
    public static function getTime($news): string
    {
        $dateTime = $news['date'];
        $dateTime = explode(' ', $dateTime);
        return $dateTime[1];
    }
}