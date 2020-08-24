<?php
class Pokemon {
    private $conn;
    private $table = "pokemons";

    //Table property
    public $id;
    public $name;
    public $picture;
    public $created_at;
    public $updated_at;

    public function __construct($db){
        $this->conn = $db;
    }

    //Get Pokemons
    function read(){
        $query = "SELECT * FROM $this->table";

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute
        $stmt->execute();

        return $stmt;
    }
}
?>