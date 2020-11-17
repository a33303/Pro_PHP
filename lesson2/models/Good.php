<?php
namespace App\models;

class Good extends Model
{
    use TCalc;

    protected function getTableName(): string
    {
        return 'goods';
    }

    public function getCalc($a, $b)
    {
        return 'В трейте подсчет' . $this->init($a, $b);
    }

}

