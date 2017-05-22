<?php

namespace Acme\Tests;

use Acme\App;
use Behat\Behat\Context\Context;

require 'vendor/autoload.php';

/**
 * Application Context that ensures Acme application is available.
 * It also handles @db-reset tag
 *
 * Typical usage:
 * $app = AppContext::app();
 *
 * @package Acme\Tests
 */
class AppContext implements Context
{
    /** @var App */
    private static $app = null;

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
    public static function resetApp()
    {
        //get rid of application so that new feature receives new instance
        self::$app = null;
    }

    /**
     * @BeforeFeature @db-reset
     */
    public static function dbReset()
    {

        self::app()->getContainer()['dbService']->resetDb();
    }

    /**
     * @return App
     */
    private static function createApp()
    {
        return self::$app = new \Acme\App();
    }
}

