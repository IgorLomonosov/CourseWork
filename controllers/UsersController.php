<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Users;

class UsersController extends Controller
{
    public function actionLogin()
    {
        if (Users::IsUserLogged()) {
            return $this->redirect('/');
        } else {
            if ($this->isPost) {
                $user = Users::findByLoginAndPassword($this->post->login, $this->post->password);
                if (!empty($user)) {
                    Users::LoginUser($user);
                    return $this->redirect('/');
                } else {
                    $this->addErrorMessage('Неправильний логін та/або пароль.');
                }
            }
            return $this->render();
        }
    }

    public function actionRegister()
    {
        if ($this->isPost) {
            $user = Users::FindByLogin($this->post->login);
            if(!empty($user)) {
                $this->addErrorMessage('Користувач із таким логіном вже існує');
            }
            if(strlen($this->post->login) === 0)
                $this->addErrorMessage('Логін не вказано!');
            if(strlen($this->post->password) === 0)
                $this->addErrorMessage('Пароль не вказано!');
            if(strlen($this->post->password2) === 0)
                $this->addErrorMessage('Повторно пароль не вказано!');
            if(strlen($this->post->lastName) === 0)
                $this->addErrorMessage('Прізвище не вказано!');
            if(strlen($this->post->firstName) === 0)
                $this->addErrorMessage("Ім'я не вказано!");
            if($this->post->password != $this->post->password2)
                $this->addErrorMessage('Паролі не співпадають');
            if(!$this->isErrorMessagesExists()){
                Users::RegisterUser($this->post->login, $this->post->password,$this->post->lastName, $this->post->firstName);
                return $this->redirect('/users/registersuccess');
            }
        }
        return $this->render();
    }
    public function actionRegistersuccess()
    {
        return $this->render();
    }
    public function actionLogout()
    {
        Users::LogoutUser();
        return $this->redirect('/users/login');
    }
}