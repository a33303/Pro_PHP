<?php
namespace App\controllers;

use App\models\Good;

class GoodController extends Controller
{

    public function allAction()
    {
        return $this->render(
            'goods',
            [
                'goods' => (new Good())->getAll(),
                'title' => 'Каталог',
            ]
        );
    }

    public function oneAction()
    {
        $id = (int)$_GET['id'];
        return $this->render(
            'good',
            [
                'good' => (new Good())->getOne($id),
            ]
        );
    }

    public function updateAction()
    {
        if (empty($_GET['id'])) {
            $this->setMSG('не передан id');
            header('Location: ?c=good&a=all');

            return '';
        }

        $id = (int) $_GET['id'];
        /** @var Good $good */
        $good = (new Good)->getOne($id);

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return $this->render(
                'good_update',
            [
                'good' => $good
                ]
            );
        }

        $good->name = $_POST['name'];
        $good->price = $_POST['price'];
        $good->save();

        $this->setMSG('Товар изменён');
        header('Location: ?c=good&a=update&id=' . $id);
        return '';
    }
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return $this->render('good_add');
        }
        $good = new Good();
        $good->name = $_POST['name'];
        $good->price = $_POST['price'];
        $good->save();
        $this->setMSG('Товар добавлен');
        header('Location: ?c=good&a=add');
        return '';
    }
}