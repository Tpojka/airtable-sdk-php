<?php
/**
 * Project airtable-sdk-php
 * File: Table.php
 * Created by: tpojka
 * On: 26/03/2020
 */

namespace Beachcasts\Airtable;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Table
 * @package Beachcasts\Airtable
 */
class Table
{
    /**
     * @var string
     */
    private $baseId;

    /**
     * @var string
     */
    private $tableName;

    /**
     * @var Client
     */
    private $client;

    /**
     * Table constructor.
     * @param string $baseId
     * @param string $tableName
     */
    public function __construct(string $baseId, string $tableName)
    {
        $this->baseId = $baseId;
        $this->tableName = $tableName;

        $baseUri = implode('/', [
            $_ENV['BASE_URL'],
            $_ENV['VERSION'],
            $this->baseId,
        ]);

        $this->client = new Client([
            'base_uri' => $baseUri
        ]);
    }

    /**
     * @return Client|null
     */
    private function getClient(): Client
    {
        $this->client->request(
            'GET',
            $this->tableName,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $_ENV['API_KEY'],
                ]
            ]
        );

        return $this->client;
    }

    /**
     * @param Client $connection
     * @param string $view
     * @return ResponseInterface
     */
    public function list(Client $connection, string $view = "Grid view"): ResponseInterface
    {
        $client = $this->getClient();

        return $client->request(
            'GET',
            $this->name . '?maxRecords=3&view=' . $view,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $_ENV['API_KEY'],
                ]
            ]
        );
    }
}
