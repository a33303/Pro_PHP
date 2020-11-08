<?php
namespace App\models;

class Basket extends Model
{
    use TCalc;

    protected function getTableName(): string
    {
        return 'basket';
    }
}