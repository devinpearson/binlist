<?php namespace DevinPearson\BinList;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

/**
 *  BinListConnector
 *
 *  connects to binlist and retrieves the result
 *
 *  @author Devin Pearson
 */
class BinListConnector
{
    /**  @var Client $client guzzle client for calling the http requests */
    private $client;

    /**
     * BinListConnector constructor.
     * @param Client|null $client
     */
    public function __construct(Client $client = null)
    {
        $this->client = $client;
        if (!$client instanceof Client)
        {
            $this->client = new Client();
        }
    }

    /**
     * Check Method
     *
     * Fetches the bin number details from binlist.com
     *
     * @param string $binNumber the bin number your searching for
     *
     * @return string
     */
    public function check($binNumber)
    {
        $url = 'https://lookup.binlist.net/'.$binNumber;

        return $this->request($url);
    }

    /**
     * Returns the json encoded result
     * @param $url
     * @return string
     * @throws BinListException
     */
    private function request($url)
    {
        try {
            $response = $this->client->request(
                'GET',
                $url,
                [
                    'headers' => [
                        'Accept-Version' => 3,
                    ]
                ]
            );

            return (string) $response->getBody();

        } catch (ConnectException $e) {
            throw new BinListException($e->getMessage());
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() == '404') {
                throw new BinListException('bin not found');
            }
            throw new BinListException($e->getMessage());
        } catch (\GuzzleHttp\Exception\GuzzleException $e)
        {
            throw new BinListException($e->getMessage());
        }
    }
}