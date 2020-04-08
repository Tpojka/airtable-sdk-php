<?php
/**
 * Project airtable-sdk-php
 * File: index.php
 * Created by: tpojka
 * On: 08/04/2020
 */

use Beachcasts\Airtable\Instance;
use Beachcasts\Airtable\Table;

require_once 'vendor/autoload.php';

$instance = new Instance('someBaseId', 'someTableName');

$table = new Table($instance);

// $table->list()
