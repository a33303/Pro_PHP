<?php

namespace App\tests;

use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    /**
     * @param $c
     * @param $a
     * @param $b
     *
     * @dataProvider getDataForTestFirst
     */
    public function testFirst($c, $a, $b)
    {
        $result = $a + $b;
        $this->assertEquals($c, $result);
    }

    public function testSecond()
    {
        $this->assertEquals(2, 2);
        $this->assertTrue(true);
    }

    public function getDataForTestFirst()
    {
        return [
            [4, 2, 2],
            [5, 3, 2],
            [6, 4, 2],
        ];
    }
}
