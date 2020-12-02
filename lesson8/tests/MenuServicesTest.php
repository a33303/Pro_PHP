<?php

namespace App\tests;

use App\services\MenuServices;
use App\services\Request;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MenuServicesTest extends TestCase
{

    public function testGetMenu()
    {
        /** @var MockObject|Request $mockRequest */
        $mockRequest = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockRequest->expects($this->once())
            ->method('getSession')
            ->willReturn('test');

        $menuServices = new MenuServices();
        $menu = $menuServices->getMenu($mockRequest);

        $expected = <<<php
    <li><a href="/?c=user&a=index">Главная</a></li>
    <li><a href="/?c=good&a=all">Каталог</a></li>
    <li><a href="/?c=user&a=all">Все пользователи</a></li>
    <li><a href="/?c=user&a=add">Добавить</a></li>    <li><a href="/?c=auth&a=exit">Выход</a></li>
php;

        $this->assertEquals($expected, $menu);
    }

    public function testGetMenu_no()
    {
        /** @var MockObject|Request $mockRequest */
        $mockRequest = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockRequest->expects($this->once())
            ->method('getSession')
            ->willReturn('');

        $menuServices = new MenuServices();
        $menu = $menuServices->getMenu($mockRequest);

        $expected = <<<php
    <li><a href="/?c=user&a=index">Главная</a></li>
    <li><a href="/?c=good&a=all">Каталог</a></li>
    <li><a href="/?c=user&a=all">Все пользователи</a></li>
    <li><a href="/?c=user&a=add">Добавить</a></li>    <li><a href="/?c=auth&a=add">Регистрация</a></li>
    <li><a href="/?c=auth&a=in">Авторизация</a></li>
php;

        $this->assertEquals($expected, $menu);
    }

    public function testGetPriceWithTax()
    {
        $menuServices = new MenuServices();

        $method = new \ReflectionMethod($menuServices, 'getPriceWithTax');
        $method->setAccessible(true);

        $priceWithTax = $method->invoke($menuServices, 100, 0.2);
        $this->assertEquals(120, $priceWithTax);

//        $priceWithTax = $menuServices->getPriceWithTax(100, 0.2);
//        $this->assertEquals(120, $priceWithTax);
//
//        $priceWithTax = $menuServices->getPriceWithTax(100, 20);
//        $this->assertEquals(0, $priceWithTax);
    }
}
