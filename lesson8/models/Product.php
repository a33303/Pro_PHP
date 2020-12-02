<?php
namespace App\models;

class Product extends Model
{
    use TCalc;

    protected function getTableName(): string
    {
        return 'product';
    }
}