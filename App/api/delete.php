<?php
use App\config\Database;
use App\model\Starship;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$database = new Database();
$db = $database->getConnection();

$item = new Starship($db);

$data = json_decode(file_get_contents("https://swapi.dev/api/starships/"));

$item->id =  $_GET['id'];

if($item->deleteStarship()){
    echo json_encode("Spaceship deleted.");
} else{
    echo json_encode("Data could not be deleted");
}