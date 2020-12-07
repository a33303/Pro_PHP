<?php
namespace App\models;

use App\services\DB;

abstract class Model
{
    abstract protected function getTableName(): string;

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->getDB()->getAllObjects($sql, static::class);
    }

    public function getOne(int $id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id ";
        $params = [':id' => $id];
        return $this->getDB()->getOneObject($sql, static::class, $params);
    }

    protected function insert()
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

        $sql = sprintf(
            "INSERT INTO  %s (%s)  VALUES  (%s);",
            $this->getTableName(),
            implode(',', $fields),
            implode(',', array_keys($params))
        );

        $this->getDB()->exec($sql, $params);
        $this->id = $this->getDB()->getLastId();
    }

    protected function update()
    {
        $params = [];
        $fields = [];

        foreach ($this as $key => $value) {
            if (!isset($value) ) {
                continue;
            }

            $placeholder = ":" . $key;
            $params[$placeholder] = $value;

            if ($key == 'id') {
                continue;
            }

            $fields[] = "$key = $placeholder";
        }

        $sql = sprintf(
            "UPDATE %s SET %s WHERE id = :id",
            $this->getTableName(),
            implode(', ', $fields)
        );

        return $this->getDB()->exec($sql, $params);
    }

    public function save()
    {
        if (empty($this->id)) {
            $this->insert();
            return;
        }

        $this->update();
    }

    protected function getDB(): DB
    {
        return DB::instance();
    }

    private function addImage(string $title, string $path)
    {
        $sql = "INSERT INTO images(title, path) VALUES ('{$title}','{$path}')";
        return $this->getDB()->exec($sql);
    }
}
