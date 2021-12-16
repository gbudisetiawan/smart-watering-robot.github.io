<?php

    require __DIR__.'/vendor/autoload.php';
    use Kreait\Firebase\Factory;

    $factory = (new Factory)
        ->withServiceAccount('swrobo-1640c-firebase-adminsdk-8cseq-1db3c9ee49.json')
        ->withDatabaseUri('https://swrobo-1640c-default-rtdb.firebaseio.com/');

    $database = $factory->createDatabase();
?>