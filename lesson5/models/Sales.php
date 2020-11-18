<?php
namespace App\models;

class Sales extends Model
{
    use TCalc;

    protected function getTableName(): string
    {
        return 'sales';
    }
}
