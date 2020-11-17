<?php
namespace App\models;

abstract class Model
{
    /** @var IDB  */
    protected $db;

    /**
     * Model constructor.
     * @param IDB $db
     */
    public function __construct(IDB $db)
    {
        $this->db = $db;
    }

    abstract protected function getTableName(): string;

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->getAll($sql);
    }

    public function getOne(int $id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = " . $id;
        return $this->db->getOne($sql);
    }
}
