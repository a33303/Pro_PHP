<?php


namespace App\services\renders;


use App\services\Request;

class BasketServices
{
    const GOODS = 'goods';

    public  function add(GoodRepository $goodRepository, Request $request, $id)
    {
        if (empty($id)) {
            return false;
        }

        $good = $goodRepository->getOne($id);

        if (empty($good)) {
            return false;
        }
        $goods = $request->getSession(static::GOODS, array());
        if (empty($goods[$id])) {
            $goods[$id] = [
                'name' => $good->name,
                'price' => $good->price,
                'count' => 1,
            ];
        } else {
            $goods[$id] ['count']++;
        }
        $request->setSession(static::GOODS, array());

        return true;
    }


}