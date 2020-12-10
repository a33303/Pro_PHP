<?php
namespace App\models;

class News extends Model
{
    protected function getTableName(): string
    {
        return 'news';
    }
}