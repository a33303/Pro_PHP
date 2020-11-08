<?php
namespace App\models;

class Orders extends Model
{
    use TCalc;

    protected function getTableName(): string
    {
        return 'orders';
    }
}