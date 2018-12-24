<?php

namespace DevinPearson\BinList;

/**
 *  A sample class.
 *
 *  Use this section to define what this class is doing, the PHPDocumentator will use this
 *  to automatically generate an API documentation using this information.
 *
 * @author Devin Pearson
 */
class BinList
{
    /**
     * @var BinListConnector $connector handling the calls to binlist
     */
    private $connector;

    public function __construct($connector = null)
    {
        if (!$connector instanceof BinListConnector) {
            $connector = new BinListConnector();
        }
        $this->connector = $connector;
    }

    /**
     * Check method.
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
     * Takes the json response and converts it in to a BinResult object set.
     *
     * @param $json
     *
     * @return BinResult
     */
    private function formatResponse($json)
    {
        $result = json_decode($json);
        $bank = new BinBank(
            $result->bank->name ?? '',
            $result->bank->url ?? '',
            $result->bank->phone ?? '',
            $result->bank->city ?? ''
        );
        $country = new BinCountry(
            $result->country->numeric ?? '',
            $result->country->alpha2 ?? '',
            $result->country->name ?? '',
            $result->country->emoji ?? '',
            $result->country->currency ?? '',
            $result->country->latitude ?? 0,
            $result->country->longitude ?? 0
        );
        $binResult = new BinResult(
            $result->scheme ?? '',
            $result->type ?? '',
            $result->brand ?? '',
            $result->prepaid ?? '',
            $country ?? '',
            $bank ?? ''
        );

        return $binResult;
    }
}
