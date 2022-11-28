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
$nave = $data->results;
$item->id = $_GET['id'];

// employee values
$item->name = (!isset($_GET['name']) ? $nave[$item->id]->name : $_GET['name']);
$item->manufacturer = (!isset($_GET['manufacturer']) ? $nave[$item->id]->manufacturer : $_GET['manufacturer']);
$item->cost_in_credits = (!isset($_GET['cost_in_credits']) ? $nave[$item->id]->cost_in_credits : $_GET['cost_in_credits']);

if ($item->updateStarship()) {
    echo json_encode("Spaceship data updated.");
} else {
    echo json_encode("Data could not be updated");
}