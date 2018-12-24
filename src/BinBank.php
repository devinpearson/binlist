<?php

namespace DevinPearson\BinList;

/**
 *  BinBank class.
 *
 *  The card issuers bank object
 *  provides the card issuers contact details
 *
 * @author Devin Pearson
 */
class BinBank
{
    /**
     * @var string Name of the bank who issued the card number 
     */
    public $name = '';
    /**
     * @var string the banks web address 
     */
    public $url = '';
    /**
     * @var string Card issuers contact number 
     */
    public $phone = '';
    /**
     * @var string the city the card issuer is located in 
     */
    public $city = '';

    /**
     * BinBank constructor.
     *
     * @param string $name
     * @param string $url
     * @param string $phone
     * @param string $city
     */
    public function __construct($name, $url, $phone, $city)
    {
        $this->name = $name;
        $this->url = $url;
        $this->phone = $phone;
        $this->city = $city;
    }
}
