<?php

namespace models;

use core\Core;
use core\Model;

/**
 * @property int $id Унікальний ідентифікатор користувача
 * @property string $login Логін користувача
 * @property string $password Пароль користувача
 * @property string $firstname Ім'я користувача
 * @property string $lastname Прізвище користувача
 */
class Users extends Model
{
    public static $tableName = 'users';
    public static function FindByLoginAndPassword($login,$password)
    {
        $rows = self::findByCondition(['login' => $login, 'password' => $password]);
        if(!empty($rows))
            return $rows[0];
        else
            return null;
    }
    public static function FindByLogin($login)
    {
        $rows = self::findByCondition(['login' => $login]);
        if(!empty($rows))
            return $rows[0];
        else
            return null;
    }
    public static function IsUserLogged()
    {
        return !empty(Core::get()->session->get('user'));
    }
    public static function LoginUser($user)
    {
        Core::get()->session->set('user', $user);
    }
    public static function LogoutUser()
    {
        Core::get()->session->remove('user');
    }
    public static function RegisterUser($login,$password,$firstname,$lastname)
    {
        $user = new Users();
        $user->login = $login;
        $user->password = $password;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->save();
    }
}