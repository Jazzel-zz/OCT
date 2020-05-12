<?php
include_once 'config/database.php';
include_once 'objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$user = new User($db);


$user_id =$_SESSION['user_id'];
$stmt = $user->get_name($user_id);
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo $row['first_name'] . ' ' . $row['last_name'] ;

}
