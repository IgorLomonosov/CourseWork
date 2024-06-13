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

    public function actionModeration($params)
    {
        if($this->isPost){
            if($this->post->action === 'updateRole'){
                $user = Users::createObjById($params[0]);
                $user->role = $this->post->role;
                $user->saveUpdate();
            }
        }
        $users = Users::findByCondition(null);
        $this->template->setParam('users',$users);
        return $this->render();
    }

    public function actionRegister()
    {
        if ($this->isPost) {
            $user = Users::FindByLogin($this->post->login);
            if (!empty($user)) {
                $this->addErrorMessage('Користувач із таким логіном вже існує');
            }
            if (strlen($this->post->login) === 0)
                $this->addErrorMessage('Логін не вказано!');
            if (strlen($this->post->password) === 0)
                $this->addErrorMessage('Пароль не вказано!');
            if (strlen($this->post->password2) === 0)
                $this->addErrorMessage('Повторно пароль не вказано!');
            if (strlen($this->post->lastName) === 0)
                $this->addErrorMessage('Прізвище не вказано!');
            if (strlen($this->post->firstName) === 0)
                $this->addErrorMessage("Ім'я не вказано!");
            if ($this->post->password != $this->post->password2)
                $this->addErrorMessage('Паролі не співпадають');
            if (!$this->isErrorMessagesExists()) {
                Users::RegisterUser($this->post->login, $this->post->password, $this->post->lastName, $this->post->firstName);
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

    public function actionDeleteself()
    {
        if ($this->isPost) {
            if ($this->post->password === Core::get()->session->get('user')['password']) {
                $id = Core::get()->session->get('user')['id'];
                Users::LogoutUser();
                Users::deleteById($id);
                return $this->redirect('/users/deletesuccess');
            } else {
                $this->addErrorMessage('Пароль вказаний не вірно!');
            }
        }
        return $this->render();
    }

    public function actionDeletesuccess()
    {
        return $this->render();
    }

    public function actionDeleteuser($params)
    {
        if($this->isPost){
            if($this->post->action === 'deleteUser'){
                if(Core::get()->session->get('user')['id'] === $params[0]){
                    Users::LogoutUser();
                }
                Users::deleteById($params[0]);
            }
        }
        return $this->render();
    }
}