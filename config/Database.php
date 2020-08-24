<?php
class Database {
    private $host = '10.0.0.15';
    private $db_name = 'pokemon';
    private $username = 'root';
    private $password = 'docker';
    private $connection;

    public function connect(){
        $this->connection = null;
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->connection;
    }

}
?>