<?php
namespace App\services;

interface IDB
{
    const ERROR_CONNECT = 500;

    /**
     *
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function getAll($sql, $params = []);
    public function getOne($sql, $params = []);
    public function exec($sql, $params = []);
}