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
 * @property int $isApproved Дата створення новини
 */
class News extends Model
{
    public static $tableName = 'news';

    public static function getDate($news): string
    {
        $dateTime = $news['date'];
        $dateTime = explode(' ', $dateTime);
        $date = $dateTime[0];
        $date = explode('-', $date);
        $date = array_reverse($date);
        return implode('.', $date);
    }

    public static function getTime($news): string
    {
        $dateTime = $news['date'];
        $dateTime = explode(' ', $dateTime);
        return $dateTime[1];
        //Перевірити юзабельність в кінці
    }

    public static function saveNews($title, $short_text, $text, $isApproved, $date, $newsId = null)
    {
        $isUpdate = false;
        if ($newsId !== null) {
            $news = self::createObjById($newsId);
            $isUpdate = true;
        } else {
            $news = new News();
        }
        $news->title = $title;
        $news->short_text = $short_text;
        $news->text = $text;
        $news->date = $date;
        $news->isApproved = $isApproved;
        if($isUpdate){
            $news->saveUpdate();
        }
        else{
            $news->saveInsert();
        }
    }
    public static function searchNewsByTitle($title)
    {
        $db = Core::get()->db;
        $sql = "SELECT * FROM news WHERE title LIKE :title AND isApproved = 1 ORDER BY date DESC";
        $sth = $db->pdo->prepare($sql);
        $sth->bindValue(':title', '%' . $title . '%', \PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetchAll();
    }
}