<?php
namespace App\controllers;

use App\models\User;

class UserController extends Controller
{
    protected string $defaultAction = 'index';

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
        $id = (int) $_GET['id'];
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

        if ($this->request->methodIsGet()) {
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

    public function addUser()
    {
        if ($this->request->methodIsGet()) {
            return $this->render('user_add');
        }

        $this->addUser();

        $this->setMSG('Пользователь добавлен');
        header('Location: ?c=user&a=add');

        return '';
    }



}