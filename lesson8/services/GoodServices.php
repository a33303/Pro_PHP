<?php

namespace App\services;

use App\models\Good;
use App\models\Model;


class GoodServices
{
    public function save($id, $data)
    {

        if (!$this->isVerifiedDate($data))
        {
            return null;
        }

        $good = new Good();

        if (!empty($id))
        {
            $good = (new GoodRepository())->getOne($id);
        }

        $good->name = $data['name'];
        $good->info = $data['info'];
        $good->price = $data['price'];
        (new GoodRepository())->save($good);

        return $good;
    }

    protected function isVerifiedDate($data)
    {
        if (empty($data['name'] || empty($data['info'] || empty($data['price'] ))))
        {
            return false;
        }
        return true;
    }
}

