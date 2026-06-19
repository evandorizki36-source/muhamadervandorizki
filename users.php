<?php

class Users
{
    private $conn;
    private $table = "users";

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($Username, $email, $Asal, $password)
    {
        $sql = "INSERT INTO users
                (Username, email, Asal, password)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "ssss",
            $Username,
            $email,
            $Asal,
            $password
        );

        return $stmt->execute();
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users
                WHERE Username = ?
                AND password = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "ss",
            $username,
            $password
        );

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function hapus($ID){
        $sql = "DELETE FROM $this->table WHERE ID = " . $ID;
        $result = $this->conn->query($sql);
        return $result;
    }
    public function ambilUserdariId($id){
        $sql = "SELECT * FROM $this->table WHERE id = " . $id;
        $result = $this->conn->query($sql);
        return $result -> fetch_assoc();
    }
    
    public function update($id, $username, $email, $asal, $password){
        $sql = "UPDATE $this->table SET 
        Username = '$username', email = '$email', Asal = '$asal', password = '$password' WHERE ID = " . $id;
        $result = $this->conn->query($sql);
        return $result;          
    }
}

?>