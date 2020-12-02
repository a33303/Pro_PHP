<?php
namespace App\controllers;

use App\models\Good;

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
        if ($this->methodIsGet()) {
            return $this->render('user_add');
        }
        $this->addUser();
    }
}