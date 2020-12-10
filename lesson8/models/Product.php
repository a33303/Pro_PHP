<?php
namespace App\models;

class Product extends Model
{
    protected function getTableName(): string
    {
        return 'product';
    }
}