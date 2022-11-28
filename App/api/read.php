<?php
use App\config\Database;
use App\model\Starship;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$database = new Database();
$db = $database->getConnection();
$items = new Starship($db);
$stmt = $items->getStarship();
$itemCount = $stmt->rowCount();

echo json_encode($itemCount);

if($itemCount > 0){

    $starshipArr = array();
    $starshipArr["body"] = array();
    $starshipArr["itemCount"] = $itemCount;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $e = array(
            "name" => $name,
            "manufacturer" => $manufacturer,
            "cost_in_credits" => $cost_in_credits
        );

        array_push($starshipArr["body"], $e);
    }
    echo json_encode($starshipArr["body"]);

}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
