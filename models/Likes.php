<?php

namespace models;
use core\Model;

/**
 * @property int $id Ідентифікатор вподобайки
 * @property int $user Ідентифікатор користувача що залишив вподобайку
 * @property int $news Ідентифікатор новини на якій залишено вподобайку
 */
class Likes extends Model
{
    public static $tableName = 'likes';
}