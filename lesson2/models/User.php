<?php
namespace App\models;

class User extends Model
{
    use TCalc;

    protected function getTableName(): string
    {
        return 'users';
    }
}
