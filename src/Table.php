<?php
/**
 * Project airtable-sdk-php
 * File: Table.php
 * Created by: tpojka
 * On: 26/03/2020
 */

namespace Beachcasts\Airtable;

use Psr\Http\Message\ResponseInterface;

/**
 * Class Table
 * @package Beachcasts\Airtable
 */
class Table
{
    /**
     * Object where base and table identifiers are stored
     *
     * @var Instance
     */
    private $instance;

    /**
     * @var string
     */
    private $baseId;

    /**
     * @var string
     */
    private $tableName;

    /**
     * @var AirtableClient
     */
    private $airtableClient;

    /**
     * Table constructor.
     * @param Instance $instance
     */
    public function __construct(Instance $instance)
    {
        $this->instance = $instance;
        $this->baseId = $this->getBaseId();
        $this->tableName = $this->getTableName();
        $this->airtableClient = new AirtableClient($instance);
    }

    /**
     * @return string
     */
    public function getBaseId()
    {
        return $this->instance->getBaseId();
    }

    /**
     * @return string
     */
    private function getTableName()
    {
        return $this->instance->getTableName();
    }

    /**
     * @param string $view
     * @return ResponseInterface
     */
    public function list(string $view = "Grid view"): ResponseInterface
    {
        $client = $this->airtableClient->getClient();

        return $client->request(
            'GET',
            $this->tableName . '?maxRecords=3&view=' . $view,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $_ENV['API_KEY'],
                ]
            ]
        );
    }
}
