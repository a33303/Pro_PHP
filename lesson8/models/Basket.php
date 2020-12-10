<?php
namespace App\models;

class Basket extends Model
{
    public $id;
    public $price;
    public $name;


    protected function getTableName(): string
    {
        return 'basket';
    }
}