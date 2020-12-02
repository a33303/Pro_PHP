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
    public $is_admin;

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

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->is_admin;
    }

    /**
     * @param mixed $is_admin
     */
    public function setIsAdmin($is_admin): void
    {
        $this->is_admin = $is_admin;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


}
