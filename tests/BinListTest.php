<?php

namespace DevinPearson\Tests\BinList;

use DevinPearson\BinList\BinList;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 *  Corresponding Class to test YourClass class.
 *
 *  For each class in your library, there should be a corresponding Unit-Test for it
 *  Unit-Tests should be as much as possible independent from other test going on.
 *
 * @author yourname
 */
class BinListTest extends TestCase
{
    public function testIsThereAnySyntaxError()
    {
        $var = new BinList();
        $this->assertTrue(is_object($var));
        unset($var);
    }

    public function testCheck()
    {
        $connector = Mockery::mock(\DevinPearson\BinList\BinListConnector::class);
        $binList = new BinList($connector);
        $json = '{"number":{"length":16,"luhn":true},"scheme":"visa","type":"debit","brand":"Visa/Dankort",
        "prepaid":false,"country":{"numeric":"208","alpha2":"DK","name":"Denmark","emoji":"🇩🇰",
        "currency":"DKK","latitude":56,"longitude":10},
        "bank":{"name":"Jyske Bank","url":"www.jyskebank.dk","phone":"+4589893300","city":"Hjørring"}}';
        $connector->shouldReceive('check')->andReturn($json);
        $result = $binList->check('1111111');
        $this->assertTrue($result instanceof \DevinPearson\BinList\BinResult);
        unset($connector, $binList, $json, $result);
    }
}
