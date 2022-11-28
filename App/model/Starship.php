<?php

namespace App\model ;

/**
 * @package App\class
 * Class Starship
 */
class Starship
{
    /** @var  */
    private $conn;

    // Table
    /** @var string  */
    private $db_table = "starship";
    // Columns

    /** @var int  */
    public $id;

    /** @var string  */
    public $name;

    /** @var string */
    public $manufacturer;

    /** @var string */
    public $cost_in_credits;

    /**
     * Db connection
     * @param $db
     */
    public function __construct($db){
        $this->conn = $db;
    }

    /**
     * GET ALL
     * @return mixed
     */
    public function getStarship(){
        $sqlQuery = "SELECT * FROM " . $this->db_table ."";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    /**
     * CREATE
     * @return bool
     */
    public function createStarship(): bool
    {
        $sqlQuery = "INSERT INTO ". $this->db_table ." SET 
        name = :name, 
        manufacturer = :manufacturer, 
        cost_in_credits = :cost_in_credits";


        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->manufacturer=htmlspecialchars(strip_tags($this->manufacturer));
        $this->cost_in_credits=strip_tags($this->cost_in_credits);

        var_dump($this->name, $this->manufacturer, $this->cost_in_credits);
        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":manufacturer", $this->manufacturer);
        $stmt->bindParam(":cost_in_credits", $this->cost_in_credits);
       // var_dump($stmt->execute());
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    /**
     *  READ single
     * @return void
     */
    public function getSingleStarship(): void
    { var_dump($this->id);
        $sqlQuery = "SELECT * FROM ". $this->db_table ." WHERE id=?  LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(\PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->manufacturer = $dataRow['manufacturer'];
        $this->cost_in_credits = $dataRow['cost_in_credits'];
    }


    /**
     *  UPDATE
     * @return bool
     */
    public function updateStarship(): bool
    {
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        manufacturer = :manufacturer, 
                        cost_in_credits = :cost_in_credits
                    WHERE 
                    id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->manufacturer=htmlspecialchars(strip_tags($this->manufacturer));
        $this->cost_in_credits=htmlspecialchars(strip_tags($this->cost_in_credits));


        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":manufacturer", $this->manufacturer);
        $stmt->bindParam(":cost_in_credits", $this->cost_in_credits);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }


    /**
     * DELETE
     * @return bool
     */
    function deleteStarship(): bool
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

}