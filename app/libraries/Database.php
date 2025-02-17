<?php
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    // Constructor to initialize the database connection
    public function __construct() {
        $dsn = 'pgsql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            echo "Database connection error: " . $e->getMessage();
            die(); // Stop execution if connection fails
        }
    }

    // Prepare a query
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values to query parameters
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the query
    public function execute() {
        return $this->stmt->execute();
    }

    // Fetch all results as an object
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Fetch a single result as an object
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetchColumn() {
        $this->execute();
        return $this->stmt->fetchColumn();
    }

    // Get row count of results
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    // Get the last inserted ID
    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }
}
?>
