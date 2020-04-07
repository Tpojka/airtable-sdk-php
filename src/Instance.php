<?php
/**
 * Project airtable-sdk-php
 * File: Instance.php
 * Created by: tpojka
 * On: 08/04/2020
 */

namespace Beachcasts\Airtable;

class Instance
{
    /**
     * @var string $baseId
     */
    private $baseId;

    /**
     * @var string $tableName
     */
    private $tableName;

    /**
     * Instance constructor.
     * @param string $baseId
     * @param string $tableName
     */
    public function __construct(string $baseId, string $tableName)
    {
        $this->setBaseId($baseId);
        $this->setTableName($tableName);
    }

    /**
     * @param string $baseId
     */
    public function setBaseId(string $baseId)
    {
        $this->baseId = $baseId;
    }

    /**
     * @return string
     */
    public function getBaseId()
    {
        return $this->baseId;
    }

    /**
     * @param string $tableName
     */
    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }
}
