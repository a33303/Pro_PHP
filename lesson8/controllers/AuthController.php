<?php

namespace App\controllers;

use App\models\User;
use App\services\UserServices;

class AuthController extends Controller
{
    /**
     * Lj,fdktybt
     *
     * @return string
     */
    public function addAction()
    {
        if ($this->methodIsGet()) {
            return $this->render('auth_add');
        }

        $this->container->userService->saveUser($this->request->post());

        $this->setMSG('Вы зарегистрированы');
        $this->request->redirectOnUrl();
        return '';
    }

    public function inAction()
    {
        if (!empty($this->request->getSession('user'))) {
            $this->request->redirectOnUrl('/');
            return '';
        }

        if ($this->methodIsGet()) {
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

    public function exitAction()
    {
        $this->request->setSession('user', '');
        $this->request->redirectOnUrl('/');
        return '';
    }

}