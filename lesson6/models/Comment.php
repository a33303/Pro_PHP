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

    protected function addComment()
    {
        $params = [];
        $fields = [];
        foreach ($this as $key => $value) {
            if (!isset($value) || $key == 'id') {
                continue;
            }
            $placeholder = ":" . $key;
            $params[$placeholder] = $value;
            $fields[] = $key;
        }

        $sql = "SELECT * FROM comment 
            WHERE id = '{$id}',
            name = '{$name}',
            good_id = '{$good_id}',
            user_id = '{$user_id}',
            AND date = '{$date}'";

        return $this->getDB()->exec($sql, $params);
    }

