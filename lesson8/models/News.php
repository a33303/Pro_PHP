<?php
namespace App\models;

class News extends Model
{
    use TCalc;

    protected function getTableName(): string
    {
        return 'news';
    }
}