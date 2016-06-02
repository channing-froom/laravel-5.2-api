# Directory Structure
app/DataLayer
    --> Entities
    --> Mappings
    --> Proxies
    
# Composer PSR-4

```
"DataLayer\\": "app/DataLayer/"
```


# cli-config.php
Found in app/DataLayer/Mappings/cli-config.php

```
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

```


# Generating Doctine parts
Generate Doctrine YML files, Entities and Proxies for using Doctrine, Would require more set up found within doctrine package

```javascript
cd app/DataLayer/Mappings/
rm *.yml
rm ../Entities/*.php*
rm ../Proxies/*.php*
../../../vendor/doctrine/orm/bin/doctrine orm:convert-mapping --from-database yml --namespace DataLayer\\Entities\\ .
../../../vendor/doctrine/orm/bin/doctrine orm:generate-entities --generate-methods=true --generate-annotations=false --regenerate-entities=true ../../
../../../vendor/doctrine/orm/bin/doctrine orm:generate-proxies ../../../storage/proxies
```

