<?php 

include_once("db.php");
include_once("user.php");
class UserManager {

    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function create(User $user){
        $query = "insert into users (name,email,password) values(:name,:email,:password)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name',$user->name);
        $stmt->bindParam(':email',$user->email);
        $stmt->bindParam(':password',$user->password);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}