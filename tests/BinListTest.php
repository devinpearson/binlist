<?php

use PHPUnit\Framework\TestCase;

use DevinPearson\BinList\BinList;

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
    /**
     * Just check if the YourClass has no syntax error.
     *
     * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
     * any typo before you even use this library in a real project.
     */
    public function testIsThereAnySyntaxError()
    {
        $var = new DevinPearson\BinList\BinList();
        $this->assertTrue(is_object($var));
        unset($var);
    }

    /**
     * Just check if the YourClass has no syntax error.
     *
     * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
     * any typo before you even use this library in a real project.
     */
    public function testCheck()
    {
        $connector = Mockery::mock(\DevinPearson\BinList\BinListConnector::class);
        $binList = new BinList($connector);
        $json = '{"number":{"length":16,"luhn":true},"scheme":"visa","type":"debit","brand":"Visa/Dankort","prepaid":false,"country":{"numeric":"208","alpha2":"DK","name":"Denmark","emoji":"🇩🇰","currency":"DKK","latitude":56,"longitude":10},"bank":{"name":"Jyske Bank","url":"www.jyskebank.dk","phone":"+4589893300","city":"Hjørring"}}';
        $connector->shouldReceive('check')->andReturn($json);
        $result = $binList->check("1111111");
        $this->assertTrue($result instanceof \DevinPearson\BinList\BinResult);
        unset($connector, $binList, $json, $result);
    }
}
