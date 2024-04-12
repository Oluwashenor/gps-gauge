<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('gps-fuel-firebase-adminsdk-5vngk-881264256f.json')
->withDatabaseUri('https://gps-fuel-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
?>