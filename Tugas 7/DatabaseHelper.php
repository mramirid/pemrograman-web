<?php 

class DatabaseHelper
{
    private static $INSTANCE = NULL;

    private $dbServer = NULL;
    private $dbUsername = NULL;
    private $dbPass = NULL;
    private $dbName = NULL;

    private $connection = NULL;

    function __construct($dbServer, $dbUsername, $dbPass, $dbName) {
        $this->dbServer = $dbServer;
        $this->dbUsername = $dbUsername;
        $this->dbPass = $dbPass;
        $this->dbName = $dbName;

        $this->connection = new mysqli($dbServer, $dbUsername, $dbPass, $dbName);
    }

    // Implementasi Singleton Class
    public static function newInstance($dbServer, $dbUsername, $dbPass, $dbName)
    {
        if ($this::$INSTANCE == null)
            $this::$INSTANCE = new DatabaseHelper($dbServer, $dbUsername, $dbPass, $dbName);

        return $this::$INSTANCE;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

?>