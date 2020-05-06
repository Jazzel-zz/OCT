<?php
class Category{
 
    // database connection and table name
    private $conn;
    private $table_name = "categories";
 
    // object properties
    public $id;
    public $name;
    public $username;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    id, name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    // used to read category name by its ID
function readName(){
     
    $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->name = $row['name'];
}
 
function readAll($from_record_num, $records_per_page){
 
    $query = "SELECT `id`, `name`, `created_at`
            FROM
                " . $this->table_name . "
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}


// used for paging products
public function countAll(){
 
    $query = "SELECT id FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
}

// delete the product
function delete(){
 
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
     
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
 
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}


function readOne(){
 
    $query = "SELECT
                name, users, created_at
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->name = $row['name'];
    $this->user = $row['users'];
    $this->created_at = $row['created_at'];
    // $this->image = $row['image'];
}

    // used to read category name by its ID
function getUserName(){
     
    $query = "SELECT first_name, last_name FROM users WHERE id = ? limit 0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->username = $row['first_name'] . ' ' . $row['last_name'];
}

function update(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name
            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind parameters
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

// create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, users=:user";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
 

        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":user", $_SESSION['user_id']);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

}
?>