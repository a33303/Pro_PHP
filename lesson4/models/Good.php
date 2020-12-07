<?php
namespace App\models;

/**
 * Class Good
 * @package App\models
 *
 * @method  static public getOne($id)
 */

class Good extends Model
{
    public $id;
    public $name;
    public $price;
    public $info


    protected function getTableName(): string
    {
        return 'goods';
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

            return $this->getDB()->exec($sql, $params); //todo last id
        }

    protected function update()
    {
        $params = [];
        $fields = [];
        foreach ($this as $key => $value) {
            if(!isset($value)) {
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
            implode('.', $fields)
        );

        $this->getDB()->exec($sql, $params);
        $this->id = $this->getDB()->getLastId();
    }
}
