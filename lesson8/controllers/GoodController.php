<?php
namespace App\controllers;

use App\models\Good;
use App\models\Model;

class GoodController extends Controller
{
    public function allAction()
    {
        $goodsObj = (new Good())->getAll();
        return $this->render(
            'goods',
            [
                'goods' => $goodsObj,
                'title' => 'Католог',
            ]
        );
    }

    public function oneAction()
    {
        $id = $this->getId();
        $good = (new Good())->getOne($id);
        return $this->render(
            'good',
            [
                'good' => $good,
            ]
        );
    }

    public function addAction()
    {
        if ($this->request->methodIsGet()) {
            return $this->render('good_add');
        }

        $id = $this -> getId();
        (new GoodServices())->save(
            $id,
            $this->request->post()
        );

        $this->setMSG('Товар добавлен');
        header('Location: ?c=good&a=all');

        return $this->render(
            'addGood',
            ['good' => new Good() ]
        );

    }

}