<?php
$config = [
    'db' => [
        'host' => 'localhost',
        'dbName' => 'acme',
        'username' => 'root',
        'password' => '',
    ],

    /** Root directory of the project */
    'ACME_ROOT' => realpath(__DIR__.'/../'),

    /** Slim error settings */
    'displayErrorDetails' => true,
];
