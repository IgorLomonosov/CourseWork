<?php

namespace models;
use core\Model;

/**
 * @property int $id Ідентифікатор коментаря
 * @property int $user Ідентифікатор користувача що залишив коментар
 * @property int $news Ідентифікатор новини на якій залишено коментар
 * @property string $content Вміст коментаря
 */
class Comments extends Model
{
    public static $tableName = 'comments';
    public static function addComment($news,$user,$content):void
    {
        $comment = new Comments();
        $comment->news = $news;
        $comment->user = $user;
        $comment->content = $content;
        $comment->save();
    }
}