<?php

include_once("user.php");
class UserService {

        public function validate(User $user){
            if(empty($user->name) || empty($user->email) || empty($user->password)){
                throw new Exception("All fields are required");
            }
            if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format.");
            }
    
            if (strlen($user->password) < 6) {
                throw new Exception("Password must be at least 6 characters long.");
            }
        }
}