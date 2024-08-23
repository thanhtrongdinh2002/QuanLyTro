<?php
class LoginModel extends DB
{
    public function HandleLogin($username, $pass)
    {
        $sql = "SELECT * FROM user WHERE Username = '$username' AND Pass = '$pass'";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function HandleRegister($iduser, $username, $pass, $role)
    {
        $sql = "INSERT INTO `user`(`IDUser`, `Username`,`Pass`,`Role`) VALUES ('$iduser', '$username','$pass', '$role')";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function getID($iduser)
    {
        $sql = "SELECT * FROM user WHERE `IDUser`='$iduser'";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function getInfor($idchutro)
    {
        $sql = "SELECT * FROM chutro WHERE `IDChuTro`='$idchutro'";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
}
