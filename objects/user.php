<?php
class User
{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $email;
    public $role = 'user';
    public $status = true;

    public $address;
    public $date_of_birth;
    public $cell_phone;
    public $work_phone;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }



    // signup user
    function signup()
    {

        if ($this->isAlreadyExist()) {
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password, first_name=:first_name, last_name=:last_name, email=:email, role=:role, status=:status, address=:address, date_of_birth=:date_of_birth, cell_phone=:cell_phone, work_phone=:work_phone";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
        $this->cell_phone = htmlspecialchars(strip_tags($this->cell_phone));
        $this->work_phone = htmlspecialchars(strip_tags($this->work_phone));

        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":status", $this->status);

        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":date_of_birth", $this->date_of_birth);
        $stmt->bindParam(":cell_phone", $this->cell_phone);
        $stmt->bindParam(":work_phone", $this->work_phone);


        // execute query
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }
    // login user
    function login()
    {

        $this->password = md5($this->password);

        // select all query
        $query = "SELECT
                    `id`, `username`, `password`, `created_at`, `role`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='" . $this->username . "' AND password='" . $this->password . "'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function isAlreadyExist()
    {
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='" . $this->username . "'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }



    function readTop10Users($from_record_num, $records_per_page)
    {

        $query = "SELECT u.id, u.username,u.first_name, u.last_name, u.email, COUNT(*) FROM users as u RIGHT JOIN cart_items as c on c.user_id = u.id GROUP BY c.user_id HAVING COUNT(*) > 1 ORDER BY `COUNT(*)` DESC LIMIT 10";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }



    // used for paging products
    public function countAll()
    {

        $query = "SELECT id FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }

    // delete the product
    function delete()
    {

        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($result = $stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function get_name($uid)
    {
        $query = "SELECT first_name, last_name FROM users WHERE id = $uid";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }



    public function user_logout()
    {
        $_SESSION['login'] = FALSE;
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
    }
}
