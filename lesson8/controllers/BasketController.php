<?php


namespace App\controllers;

use App\models\Basket;
use App\services\renders\BasketServices;

class BasketController extends Controller
{

    public function addAction()
    {
        $isAdd = (new BasketServices())->add(
            (new GoodRepository()),
            $this->request,
            $this->getId()
        );

        $msg = 'Товар добавлен';
        if (!isAdd) {
            $msg = 'Ошибка при добавлении';
        }

    }


}