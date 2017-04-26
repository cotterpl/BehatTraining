<?php

namespace Acme\Tests;

use Acme\App;
use Behat\Behat\Context\Context;

require 'vendor/autoload.php';

class AppContext implements Context
{
    private static $app;

    /**
     * Use this to access application in tests
     *
     * @return App
     */
    public static function app()
    {
        if (!self::$app) {
            self::createApp();
        }
        return self::$app;
    }

    /**
     * @BeforeFeature
     */
    public static function renewApp()
    {
        self::createApp(); //make sure new suite receives fresh instance of app
    }

    /**
     * @BeforeFeature @db-reset
     */
    public static function dbReset()
    {

        self::app()->getContainer()->dbService->resetDb();
    }

    /**
     * @return App
     */
    private static function createApp()
    {
        return self::$app = new \Acme\App();
    }
}

