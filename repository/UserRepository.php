<?php
include "./data/DbConect.php";
include "./models/User.php";

class UserRepository
{

    public static function all()
    {
        $users = [];
        $db = new DbConnect();
        $sql = "SELECT * FROM `users`;";
        $result = $db->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $users[] = new User($row["id"], $row["name"], $row["last_name"], $row["email"], $row["phone_number"]);
        }
        $db->conn->close();
        return $users;
    }

    public static function find($id)
    {
        $db = new DbConnect();
        $sql = "SELECT *  FROM `users` WHERE `id` =" . $id . ";";
        $result = $db->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $user = new User($row["id"], $row["name"], $row["last_name"], $row["email"], $row["phone_number"]);
        }
        $db->conn->close();
        return $user;

    }

    // public static function create(){
    //     $db = new DbConnect();
    //     $sth = $db->conn->prepare("INSERT INTO users (name, last_name, email, phone_number) VALUES (?, ?, ?, ?)");
    //     $sth->execute(array($_POST['name'], $_POST['last_name'], $_POST['email'], $_POST['phone_number']));
    //     $resp = $sth->fetch();
    //     $db->conn->close();
    //     echo $resp;
    //     return $resp;
    // }

    public static function create(){
        $db = new DbConnect();
        $stmt = $db->conn->prepare("INSERT INTO users (name, last_name, email, phone_number) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['name'], $_POST['last_name'], $_POST['email'], $_POST['phone_number'],);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function update(){
        $db = new DbConnect();
        $stmt = $db->conn->prepare("UPDATE users SET name = ?, last_name = ?, email = ?, phone_number = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $_POST['name'], $_POST['last_name'], $_POST['email'], $_POST['phone_number'], $_POST['id']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy(){
        $db = new DbConnect();
        $stmt = $db->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

}
