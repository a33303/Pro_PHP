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

}