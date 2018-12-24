<?php namespace DevinPearson\BinList;

/**
*  A sample class
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author Devin Pearson
*/
class BinList
{
    /** @var BinListConnector $connector handling the calls to binlist */
    private $connector;

    public function __construct()
    {
        $this->connector = new BinListConnector();
    }

    /**
  * Check method
  *
  * Checks the bin number against binlists db,
  * returns a BinList object
  *
  * @param string $binNumber bin number being searched for
  *
  * @return BinResult
  */
   public function check($binNumber)
   {
       $binResult = $this->formatResponse($this->connector->check($binNumber));

       return $binResult;
   }

    /**
     * Takes the json response and converts it in to a BinResult object set
     * @param $json
     * @return BinResult
     */
   private function formatResponse($json)
   {
       $result = json_decode($json);
       $bank = new BinBank($result->bank->name, $result->bank->url, $result->bank->phone, $result->bank->city);
       $country = new BinCountry($result->country->numeric, $result->country->alpha2, $result->country->name, $result->country->emoji, $result->country->currency, $result->country->latitude, $result->country->longitude);
       $binResult = new BinResult($result->scheme, $result->type, $result->brand, $result->prepaid, $country, $bank);
       return $binResult;
   }
}