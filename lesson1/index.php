<?php
class Product {
    private $id;
    private $name;
    private $price;
    private $info;

    public function __construct($id, $name, $price, $info)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->info = $info;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return 'Наименование: ' . $this->name;
    }

    public function getPrice()
    {
        return 'Цена: ' . $this->price;
    }

    public function getInfo()
    {
        return 'Описание товара: ' . $this->info;
    }
}

class News {
    public $id;
    public $title;
    public $text;

    public function __construct($id, $title, $text)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getText()
    {
        return $this->text;
    }

}

class Rubric extends News {
    private $date;

    public function __construct($id, $title, $text, $date)
    {
        parent::__construct($id, $title, $text);
        $this->date = $date;
    }

    public function getData()
    {
        return 'Дата создания: ' . $this->date;
    }
}
// Дочерний класс наследует все публичные и защищенные методы из родительского класса. Отличие может быть в новых объявленных параметрах.

$product = new Product(5, 'Шкатулка',200, 'Сделано в Китае');
$news = new News (8, 'Новые поступления', 'Новые шкатулки. шкатулки новые, новые из Китая');
$rubric = new Rubric (99, 'Как правильно использовать шкатулку', 'Длинное описание на китайском языке об использовании шкатулки', "d.m.Yг")

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // 1
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4

/* В примере выше мы видим 1 класс и его 1 метод. следовательно выходит такой результат */

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A {
}

$a1 = new A;
$b1 = new B;
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2

/* В примере выше мы видим 1 класс 1 метод и еще 1 метод-наследник, которые выводит новый result */

?>

<div>
    <p><?=$product->getId()?></p>
    <p><?=$product->getName()?></p>
    <p><?=$product->getPrice()?></p>
    <p><?=$product->getInfo()?></p>
</div>
    <br>
<div>
    <p><?=$news->getId()?></p>
    <p><?=$news->getTitle()?></p>
    <p><?=$news->getText()?></p>
</div>
    <br>
<div>
    <p><?=$rubric->getId()?></p>
    <p><?=$rubric->getTitle()?></p>
    <p><?=$rubric->getText()?></p>
    <p><?=$rubric->getData()?></p>
</div>
<br>