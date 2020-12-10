<?php
namespace App\models;

class Orders extends Model
{
    protected function getTableName(): string
    {
        return 'orders';
    }
}