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
 * @property int $role Рівень допуску користувача
 */
class Users extends Model
{
    public static $tableName = 'users';

    public static function FindByLoginAndPassword($login, $password)
    {
        $rows = self::findByCondition(['login' => $login, 'password' => $password]);
        if (!empty($rows))
            return $rows[0];
        else
            return null;
    }

    public static function getInitials($user): string
    {
        $firstname = $user['firstname'];
        $firstname = str_split($firstname, 2);
        $lastname = str_split($user['lastname'], 2);
        return strtoupper($firstname[0] . $lastname[0]);
    }

    public static function FindByLogin($login)
    {
        $rows = self::findByCondition(['login' => $login]);
        if (!empty($rows))
            return $rows[0];
        else
            return null;
    }

    public static function IsUserLogged(): bool
    {
        return !empty(Core::get()->session->get('user'));
    }

    public static function LoginUser($user): void
    {
        Core::get()->session->set('user', $user);
    }

    public static function LogoutUser(): void
    {
        Core::get()->session->remove('user');
    }

    public static function RegisterUser($login, $password, $firstname, $lastname): void
    {
        $user = new Users();
        $user->login = $login;
        $user->password = $password;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->role = null;
        $user->save();
    }
}