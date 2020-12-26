<?php
namespace App\models;


class Comment extends Model
{
    public $id;
    public $good_id;
    public $name;
    public $user_id;
    public $date;

    protected function getTableName(): string
    {
        return 'comment';
    }

}

