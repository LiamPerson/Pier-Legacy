<?php

class Database {

    private $stmt;
    private $dbh;

    public function __construct() {
        $dsn = "mysql:host=" . IP_ADDRESS . ":" . PORT . ";dbname=" . DB_NAME . ";";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            $this->dbh = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
        } catch (PDOException $e) {
            echo "Connection to the MariaDB failed: " . $e->getMessage() . " ... This could be caused by not setting up your MariaDB, incorrect IP address or port, incorrect credentials, port in use for another application. Please check that you have set up your MariaDB correctly and that it is running.";
        }
    }

    public function query(string $query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($key, $value, $type = null) {
        if (is_null($type))
            $type = PDO::PARAM_STR;
        $this->stmt->bindValue($key, $value, $type);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function resultSet() {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(): int {
        return $this->stmt->rowCount();
    }

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }

}
