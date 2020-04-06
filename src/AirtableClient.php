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
    protected $baseId = null;

    /**
     * Guzzle client object
     *
     * @var Client|null
     */
    protected $client = null;

    /**
     * @var Table|null
     */
    protected $table = null;

    /**
     * Airtable constructor. Create a new Airtable Instance
     *
     * @param string $baseId
     * @param Table $table
     */
    public function __construct(string $baseId, Table $table)
    {
        $this->baseId = $baseId;
        $this->table = $table;
        $baseUri = implode(
            '/',
            [
                $_ENV['BASE_URL'],
                $_ENV['VERSION'],
                $this->baseId,
            ]
        )
            . '/';

        $this->client = new Client([
            'base_uri' => $baseUri
        ]);
    }

}
