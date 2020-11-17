<?php
namespace App\services;


class DB implements IDB
{
    public function getOne($sql, $params = [])
    {
        return 'getOne: ' . $sql;
    }

    public function getAll($sql, $params = [])
    {
        return 'getAll: ' . $sql;
    }

    public function exec($sql, $params = [])
    {
        // TODO: Implement exec() method.
    }

}
