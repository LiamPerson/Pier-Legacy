<?php

class Database {

    private $stmt;
    private $dbh;

    public function __construct() {
        $dsn = "mysql:host=" . IP_ADDRESS . ":" . PORT . ";dbname=" . DB_NAME . ";";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            $this->dbh = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
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

    public function resultSet(): ?array {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single(): ?array {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(): int {
        return $this->stmt->rowCount();
    }

}
