<?php

namespace DevinPearson\BinList;

/**
 *  BinCountry class.
 *
 *  The card issuers country object
 *  provides the card issuers country location details
 *
 *  @author Devin Pearson
 */
class BinCountry
{
    /** @var string the country numeric code */
    public $numeric = '';
    /** @var string the 2 char country code */
    public $alpha2 = '';
    /** @var string Country name */
    public $name = '';
    /** @var string the country emoji flag */
    public $emoji = '';
    /** @var string the currency code the card is denominated in */
    public $currency = '';
    /** @var int the latitude of the issuing country */
    public $latitude = '';
    /** @var int the longitude of the issuing country */
    public $longitude = '';

    /**
     * BinCountry constructor.
     *
     * @param string $numeric
     * @param string $alpha2
     * @param string $name
     * @param string $emoji
     * @param string $currency
     * @param int    $latitude
     * @param int    $longitude
     */
    public function __construct($numeric, $alpha2, $name, $emoji, $currency, $latitude, $longitude)
    {
        $this->numeric = $numeric;
        $this->alpha2 = $alpha2;
        $this->name = $name;
        $this->emoji = $emoji;
        $this->currency = $currency;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
