<?php

namespace models;
use core\Model;

/**
 * @property int $id Ідентифікатор коментаря
 * @property int $user Ідентифікатор користувача що залишив коментар
 * @property int $news Ідентифікатор новини на якій залишено коментар
 * @property string $text Вміст коментаря
 */
class Comments extends Model
{
    public static $tableName = 'comments';
}