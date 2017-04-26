<?php

namespace Acme\Service;

/**
 * Base service for DB communication
 *
 * @package Acme\Service
 */
class DbService
{
    /** @var \PDO */
    private $pdo;

    private $host;
    private $dbName;
    private $user;
    private $password;
    private $dbImportsPath;

    /**
     * DbService constructor.
     *
     * @param string $host
     * @param string $dbName
     * @param string $user
     * @param string $password
     * @param string $dbImportsPath Path to directory containing database dump files
     */
    function __construct($host, $dbName, $user, $password, $dbImportsPath)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;
        $this->dbImportsPath = $dbImportsPath;

        $this->setup();
    }

    /**
     * Set up PDO
     */
    private function setup()
    {
        $this->pdo = new \PDO("mysql:dbname=$this->dbName;host=$this->host",$this->user, $this->password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return \PDO
     */
    public function getPDO() {
        return $this->pdo;
    }

    /**
     * Revert DB to initial state.
     *
     * This method will erase existing DB!
     */
    public function resetDb()
    {
        $this->getPDO()->query("DROP DATABASE acme");
        $this->getPDO()->query("CREATE DATABASE acme");
        $this->getPDO()->query('USE acme');
        $this->getPDO()->exec(file_get_contents($this->dbImportsPath.'/acme.sql'));
        $this->setup(); //reconnect to be sure the acme.sql settings do not interfere with our connection
    }

    /**
     * @param       $statement
     * @param array $params
     *
     * @return bool
     */
    public function execute($statement, $params = []) {
        $stmt = $this->getPDO()->prepare($statement);
        return $stmt->execute($params);
    }
}

