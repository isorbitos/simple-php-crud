<?php
include "./repository/UserRepository.php";

class UserController
{

    public static function index()
    {
        $users = UserRepository::all();
        return $users;
    }

    public static function show()
    {
        $user = UserRepository::find($_POST['id']);
        return $user;
    }

    public static function store()
    {
        $resp = UserRepository::create();
        echo $resp;
        return $resp;
    }

    public static function update(){
        UserRepository::update();
    }

    public static function destroy(){
        UserRepository::destroy();
    }
}
