<?php

namespace DevinPearson\BinList;

/**
 *  BinResult class.
 *
 *  The bin object
 *  provides the results of the bin search
 *
 *  @author Devin Pearson
 */
class BinResult
{
    /** @var string Name of the scheme provider visa, mastercard */
    public $scheme = '';
    /** @var string debit or credit */
    public $type = '';
    /** @var string Brand of card */
    public $brand = '';
    /** @var bool whether the card is prepaid or not */
    public $prepaid = false;
    /** @var BinCountry the country associated with the bin number */
    public $country;
    /** @var BinBank the bank associated with the bin number */
    public $bank;

    /**
     * BinResult constructor.
     *
     * @param string     $scheme
     * @param string     $type
     * @param string     $brand
     * @param bool       $prepaid
     * @param BinCountry $country
     * @param BinBank    $bank
     */
    public function __construct($scheme, $type, $brand, $prepaid, BinCountry $country, BinBank $bank)
    {
        $this->scheme = $scheme;
        $this->type = $type;
        $this->brand = $brand;
        $this->prepaid = $prepaid;
        $this->country = $country;
        $this->bank = $bank;
    }
}
