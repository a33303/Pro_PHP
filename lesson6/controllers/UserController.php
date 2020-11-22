<?php
namespace App\controllers;

use App\models\User;

class UserController extends Controller
{
    protected $defaultAction = 'index';

    public function indexAction()
    {
        return $this->render(
            'index',
            [
                'title' => 'Название',
                'text' => 'loremssdf sdfs dfsdfsdf',
            ]
        );
    }

    public function allAction()
    {
        return $this->render(
            'users',
            [
                'users' => (new User())->getAll(),
            ]
        );
    }

    public function oneAction()
    {
        $id = (int)$_GET['id'];
        return $this->render(
            'user',
            [
                'user' => (new User())->getOne($id),
            ]
        );
    }

    public function updateAction()
    {
        if (empty($_GET['id'])) {
            $this->setMSG('Не передан id');
            header('Location: ?c=user&a=all');

            return '';
        }

        $id = (int) $_GET['id'];
        /** @var User $user */
        $user = (new User)->getOne($id);

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return $this->render(
                'user_update',
                [
                    'user' => $user
                ]
            );
        }

        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->save();

        $this->setMSG('Пользователь изменен');
        header('Location: ?c=user&a=update&id=' . $id);

        return '';
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return $this->render('user_add');
        }
        $user = new User();
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->save();
    }

    public function authAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return $this->render('user_login');
        }
        $user = new User();
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->login();

        $this->setMSG('Не авторазиваны');
        header('Location: ?c=user&a=update&id=' . $id);

        return '';
    }
}