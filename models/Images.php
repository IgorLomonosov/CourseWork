<?php

namespace models;

use core\Model;

/**
 * @property int $id
 * @property int $news
 * @property string $image
 */
class Images extends Model
{
    public static $tableName = 'images';
    public static function getImage($newsId)
    {
        $image = Images::findByCondition(['news'=>$newsId]);
        if (!empty($image))
            return base64_encode($image[0]['image']);
        else
            return null;
    }
}