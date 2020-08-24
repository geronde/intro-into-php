<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Pokemon.php';

//Instanciate db
$database = new Database();
$db = $database->connect();

$pokemon = new Pokemon($db);

$result = $pokemon->read();
$num = $result->rowCount();

if($num>0){
  
  // products array
  $pokemons_arr=array();
  $pokemons_arr["records"]=array();

  // retrieve our table contents
  // fetch() is faster than fetchAll()
  // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
  while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      // extract row
      // this will make $row['name'] to
      // just $name only
      extract($row);

      $item=array(
          "id" => $id,
          "name" => $name,
          "picture" => $picture,
          "updatedAt" => $updated_at,
          "createdAt" => $created_at
      );

      array_push($pokemons_arr["records"], $item);
  }

  // set response code - 200 OK
  http_response_code(200);

  // show pokemons data in json format
  echo json_encode($pokemons_arr);
}
?>