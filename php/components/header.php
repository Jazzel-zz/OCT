<?php
    
    // include database and object files
    include_once './../api/config/database.php';
    include_once './../api/objects/user.php';

 
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
// read the details of user to be edited

$stmt = $user->getname();


    // // get database connection
    // $database = new Database();
    // $db = $database->getConnection();
    
    // // prepare user object
    // $user = new User($db);
    // $stmt = $user->getFullname(3);

?>