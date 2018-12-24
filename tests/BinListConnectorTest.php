<?php

use DevinPearson\BinList\BinListConnector;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 *  @author Devin Pearson
 */
class BinListConnectorTest extends TestCase
{
    public function testIsThereAnySyntaxError()
    {
        $var = new DevinPearson\BinList\BinListConnector();
        $this->assertTrue(is_object($var));
        unset($var);
    }

    public function testCheck()
    {
        $json = '{"number":{"length":16,"luhn":true},"scheme":"visa","type":"debit","brand":"Visa/Dankort","prepaid":false,"country":{"numeric":"208","alpha2":"DK","name":"Denmark","emoji":"🇩🇰","currency":"DKK","latitude":56,"longitude":10},"bank":{"name":"Jyske Bank","url":"www.jyskebank.dk","phone":"+4589893300","city":"Hjørring"}}';

        $handler = HandlerStack::create(new MockHandler([
            new Response(200, [], $json),
            new Response(404),
        ]));
        $binList = new BinListConnector(new Client(['handler' => $handler]));
        $result = $binList->check("52662718");
        $this->assertJson($result);

        try {
            $binList->check("1111111");
        } catch (\DevinPearson\BinList\BinListException $exception) {
            $this->assertInstanceOf(\DevinPearson\BinList\BinListException::class, $exception);
            $this->assertEquals('bin not found', $exception->getMessage());
        }
        unset($handler, $binList, $json, $result);
    }
}
