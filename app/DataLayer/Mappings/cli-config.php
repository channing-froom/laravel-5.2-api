<?php

/**
 * CLI-Configuration file for Doctrine
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require '../../../bootstrap/autoload.php';

$databaseConnection = array(
    'driver'        => 'pdo_mysql',
    'user'          => 'root',
    'password'      => 'root',
    'dbname'        => 'laravel_api',
    'host'          => 'localhost',
    'prefix'        => '',
);

$config = Setup::createYamlMetadataConfiguration([__DIR__], true);
$entityManager = EntityManager::create($databaseConnection, $config);

return ConsoleRunner::createHelperSet($entityManager);
