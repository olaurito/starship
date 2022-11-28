<?php
use App\config\Database;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$database = new Database();
$db = $database->getConnection();
$item = new \App\Model\Starship($db);
$data = json_decode(file_get_contents("http://swapi.dev/api/starships"));

foreach ($data->results as $nave) {
    $item->name = $nave->name;
    $item->manufacturer = $nave->manufacturer;
    $item->cost_in_credits = $nave->cost_in_credits;

    if($item->createStarship()){
        echo '<h4>Spaceship created successfully.</h4>';
    } else{
        echo '<h4>Spaceship could not be created.</h4>';

    }
}

