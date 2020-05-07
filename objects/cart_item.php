<?php
// 'cart item' object
class CartItem{
 
    // database connection and table name
    private $conn;
    private $table_name = "cart_items";
 
    // object properties
    public $id;
    public $quantity;
    public $user_id;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

// check if a cart item exists
public function exists(){
 
    // query to count existing cart item
    $query = "SELECT count(*) FROM " . $this->table_name . " WHERE product_id=:product_id AND user_id=:user_id";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->product_id=htmlspecialchars(strip_tags($this->product_id));
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
 
    // bind category id variable
    $stmt->bindParam(":product_id", $this->product_id);
    $stmt->bindParam(":user_id", $this->user_id);
 
    // execute query
    $stmt->execute();
 
    // get row value
    $rows = $stmt->fetch(PDO::FETCH_NUM);
 
    // return
    if($rows[0]>0){
        return true;
    }
 
    return false;
}

// count user's items in the cart
public function count(){
 
    // query to count existing cart item
    $query = "SELECT count(*) FROM " . $this->table_name . " WHERE user_id=:user_id";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
 
    // bind category id variable
    $stmt->bindParam(":user_id", $this->user_id);
 
    // execute query
    $stmt->execute();
 
    // get row value
    $rows = $stmt->fetch(PDO::FETCH_NUM);
 
    // return
    return $rows[0];
}


 // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    product_id=:product_id, quantity=:quantity, user_id=:user_id";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        // $this->description=htmlspecialchars(strip_tags($this->description));
        // $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        // $this->image=htmlspecialchars(strip_tags($this->image));

 
        $this->user_id = 2;

        // bind values 
        $stmt->bindParam(":product_id", $this->id);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":user_id", $_SESSION['user_id']);
        echo $this->quantity; 
        // $stmt->bindParam(":category_id", $this->category_id);
        // $stmt->bindParam(":user_id", $this->user_id);
        // $stmt->bindParam(":image", $this->image);

 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }


}

?>