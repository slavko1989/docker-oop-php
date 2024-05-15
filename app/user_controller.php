<?php

require_once 'user.php';
require_once 'user_manager.php';
require_once 'user_service.php';

class UserController {

    private $user_manager;
    private $user_service;

    public function __construct(UserManager $user_manager, UserService $user_service){
        $this->user_manager = $user_manager;
        $this->user_service = $user_service;
    }

    public function createUser($name,$email,$password){
        $user = new User($name,$email,$password);

        try{
            $this->user_service->validate($user);
            $this->user_manager->create($user);
            echo "User created";
        }catch(Exception $e){
            echo "Error" . $e->getMessage();
        }
    }
}