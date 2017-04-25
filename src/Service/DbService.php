<?php

namespace Acme\Service;

class DbService
{
    /** @var \PDO */
    private $pdo;

    private $host;
    private $dbName;
    private $user;
    private $password;
    private $dbImportsPath;

    function __construct($host, $dbName, $user, $password, $dbImportsPath)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;
        $this->dbImportsPath = $dbImportsPath;

        $this->connect();
    }

    private function connect()
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

    public function resetDb()
    {
        $this->getPDO()->query("DROP DATABASE acme");
        $this->getPDO()->query("CREATE DATABASE acme");
        $this->getPDO()->query('USE acme');
        $this->getPDO()->exec(file_get_contents($this->dbImportsPath.'/acme.sql'));
        $this->connect(); //reconnect to be sure the acme.sql settings do not interfere with out connection
    }

    public function execute($statement, $params = []) {
        $stmt = $this->getPDO()->prepare($statement);
        return $stmt->execute($params);
    }
}

