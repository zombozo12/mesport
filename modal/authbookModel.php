<?php

include_once("conn/database.php");

class authbookModel
{
    public function __construct()
    {
        $this->connect = connect();
    }

    function loginUser($params)
    {
        $email    = mysqli_real_escape_string($this->connect, $params['email']);
        $password = mysqli_real_escape_string($this->connect, $params['password']);
        $password = md5($password);

        $login = $this->connect->prepare("SELECT id FROM tbl_user WHERE email = ? AND password = ?");
        $login->bind_param('ss', $email, $password);
        $login->execute();
        $login->store_result();
        $login->bind_result($id);

        if($login->num_rows == 0){
            $_SESSION['message'] = 'Write your username or password correctly!';
            return false;
        }

        while($login->fetch()){
            $this->session($id);
        }

        return true;
    }

    function loginPemilik($params){
        $email    = mysqli_real_escape_string($this->connect, $params['email']);
        $password = mysqli_real_escape_string($this->connect, $params['password']);
        $password = md5($password);

        $login = $this->connect->prepare("SELECT id FROM tbl_pemilik WHERE email = ? AND password = ?");
        $login->bind_param('ss', $email, $password);
        $login->execute();
        $login->store_result();
        $login->bind_result($id);

        if($login->num_rows == 0){
            $_SESSION['message'] = 'Write your username or password correctly!';
            return false;
        }

        while($login->fetch()){
            $this->session($id);
        }

        return true;
    }

    function registerPemilik($params){
        $nama           = mysqli_real_escape_string($this->connect, $params['nama']);
        $nohp           = mysqli_real_escape_string($this->connect, $params['nohp']);
        $email          = mysqli_real_escape_string($this->connect, $params['email']);
        $password       = mysqli_real_escape_string($this->connect, $params['password']);
        $password       = md5($password);
        $jenis_kelamin  = mysqli_real_escape_string($this->connect, $params['jenis_kelamin']);

        $rPemilik = $this->connect->prepare("INSERT INTO tbl_pemilik (nama, kontak, email, password, jenis_kelamin) VALUES(?,?,?,?,?)");
        $rPemilik->bind_param('sisss', $nama, $nohp, $email, $password, $jenis_kelamin);
        $rPemilik->execute();
        $rPemilik->store_result();
        if($rPemilik->affected_rows == 0){
            $_SESSION['message'] = "Regristrasi Gagal";
            return false;
        }
        return true;
    }

    function registerUser($params){
        $nama           = mysqli_real_escape_string($this->connect, $params['nama']);
        $nohp           = mysqli_real_escape_string($this->connect, $params['nohp']);
        $email          = mysqli_real_escape_string($this->connect, $params['email']);
        $password       = mysqli_real_escape_string($this->connect, $params['password']);
        $password       = md5($password);
        $jenis_kelamin  = mysqli_real_escape_string($this->connect, $params['jenis_kelamin']);

        $rUser = $this->connect->prepare("INSERT INTO tbl_user (nama, kontak, email, password, jenis_kelamin) VALUES(?,?,?,?,?)");
        $rUser->bind_param('sisss', $nama, $nohp, $email, $password, $jenis_kelamin);
        $rUser->execute();
        $rUser->store_result();
        if($rUser->affected_rows == 0){
            $_SESSION['message'] = "Regristrasi Gagal";
            return false;
        }
        return true;
    }

    function session($data)
    {
        $query = "SELECT * FROM tbl_user WHERE id='" . $data . "'";
        $ret = mysqli_query($this->connect, $query);
        $data = mysqli_fetch_assoc($ret);

        if (!isset($_SESSION)) session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['fName'] = $data['firstName'];
        $_SESSION['lName'] = $data['lastName'];
        $_SESSION['email'] = $data['email'];
    }

    function updateProfile($param)
    {
        $query = "UPDATE user_table SET firstName='" . $param['fName'] . "',lastName='" . $param['lName'] . "',email='" . $param['email'] . "',password='" . hash('md5', $param['password']) . "' WHERE id= '" . $param['id'] . "' ";
        $query2 = "UPDATE user_table SET firstName='" . $param['fName'] . "',lastName='" . $param['lName'] . "',email='" . $param['email'] . "' WHERE id= '" . $param['id'] . "' ";

        if ($param['password'] == "" && $param['rePass'] == "") {
            $ret = mysqli_query($this->connect, $query2);

            if ($ret > 0) {
                $this->session($_SESSION['id']);
                return true;
            } else {
                $_SESSION['message'] = 'Gagal update tipe I';
                return false;
            }

        } elseif ($param['password'] != $param['rePass']) {
            $_SESSION['message'] = 'Password anda tidak cocok!';
            return false;

        } else {
            $ret = mysqli_query($this->connect, $query);

            if ($ret > 0) {
                $this->session($_SESSION['id']);
                return true;
            } else {
                $_SESSION['message'] = 'Gagal update tipe II';
                return false;
            }
        }
    }

    function delete($id)
    {
        $query = "DELETE FROM user_table WHERE id='" . $id . "'";
        $ret = mysqli_query($this->connect, $query);

        if ($ret > 0) {
            return true;
        } else {
            $_SESSION['message'] = 'Gagal delete akun';
            return false;
        }
    }
}

?>