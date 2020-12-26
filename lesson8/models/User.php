<?php
namespace App\models;

/**
 * Class User
 * @package App\models
 *
 * @method static public getOne($id)
 */
class User extends Model
{
    public $id;
    public $login;
    public $password;

    protected function getTableName(): string
    {
        return 'users';
    }

    public function getByLogin($login)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE login = :login ";
        $params = [':login' => $login];
        return $this->getDB()->getOneObject($sql, static::class, $params);
    }
}
