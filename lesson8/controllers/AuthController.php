<?php

namespace App\controllers;

use App\models\User;

class AuthController extends Controller
{
    /**
     * Регистрация пользователя
     * @return string
     */
    public function addAction()
    {
        if ($this->request->methodIsGet()) {
            return $this->render('auth_add');
        }

        $this->container->userService->saveUser($this->request->post());

        $this->setMSG('Вы зарегистрированы');
        $this->request->redirectOnUrl();
        return '';
    }

    /**
     * Авторизация пользователя
     * @return string
     */
    public function inAction()
    {
        if (!empty($this->request->getSession('user'))) {
            $this->request->redirectOnUrl('/');
            return '';
        }

        if ($this->request->methodIsGet()) {
            return $this->render('auth_in');
        }

        $user = (new User())->getByLogin($this->request->post('login'));

        if (empty($user)) {
            $this->setMSG('Не верные данные');
            $this->request->redirectOnUrl();
            return '';
        }

        $this->request->setSession('user', $user);
        $this->setMSG('Вы авторизованы');
        $this->request->redirectOnUrl('/');
        return '';


    }

    /**
     * Окончание сессии
     * @return string
     */
    public function exitAction()
    {
        $this->request->setSession('user', '');
        $this->request->redirectOnUrl('/');
        return '';
    }

    public function isAdmin()
    {
        $user = $this->request->getSession('auth');

        return !empty($user->getIsAdmin());
    }

    public function methodIsAuth()
    {
        if (!$this->isAdmin())
        {
            $this->request->methodIsGet();
            return false;
        }
        return false;
    }

}