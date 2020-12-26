<?php

namespace App\services;

class MenuServices
{
    public function getMenu(Request $request)
    {
        $baseMenu = <<<php
    <li><a href="/?c=user&a=index">Главная</a></li>
    <li><a href="/?c=good&a=all">Каталог</a></li>
    <li><a href="/?c=user&a=all">Все пользователи</a></li>
    <li><a href="/?c=user&a=add">Добавить</a></li>
php;

        $dopMenu = <<<php
    <li><a href="/?c=auth&a=add">Регистрация</a></li>
    <li><a href="/?c=auth&a=in">Авторизация</a></li>
php;

        $user = $request->getSession('user');
        if (!empty($user)) {
            $dopMenu = <<<php
    <li><a href="/?c=auth&a=exit">Выход</a></li>
php;
        }

        return $baseMenu . $dopMenu;
    }

    protected function getPriceWithTax($price, $tax)
    {
        if ($tax >= 1) {
            return 0;
        }

        return $price * $tax + $price;
    }
}