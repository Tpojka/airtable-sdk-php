<?php

declare(strict_types=1);

namespace Beachcasts\Airtable;

use GuzzleHttp\Client;

/**
 * Class AirtableClient
 * @package Beachcasts\Airtable
 */
class AirtableClient
{
    /**
     * Base identifier
     *
     * @var null
     */
    private $baseId = null;

    /**
     * @var string
     */
    private $tableName;

    /**
     * Guzzle client object
     *
     * @var Client|null
     */
    private $client = null;

    /**
     * Airtable constructor. Create a new Airtable Instance
     *
     * @param Instance $instance
     */
    public function __construct(Instance $instance)
    {
        $this->baseId = $instance->getBaseId();
        $this->tableName = $instance->getTableName();

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
    public function getClient(): Client
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
}
