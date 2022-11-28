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
$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getSingleStarship();
if($item->name != null){
    // create array
    $nav_arr = array(
        "id" =>  $item->id,
        "name" => $item->name,
        "manufacturer" => $item->manufacturer,
        "cost_in_credits" => $item->cost_in_credits
    );

    http_response_code(200);
    echo json_encode($nav_arr);
}

else{
    http_response_code(404);
    echo json_encode("Employee not found.");
}