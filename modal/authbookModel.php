<?php

include_once("conn/database.php");

class authbookModel
{
    public function __construct()
    {
        $this->connect = connect();
    }

    function login($params)
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

    function register($params)
    {

        $query = "INSERT INTO user_table (username, no_tlp, email, password) VALUES ('" . $params['Name'] . "', '" . $params['No_tlp'] . "', '" . $params['email'] . "', '" . hash('md5', $params['password']) . "')";
        $ret = mysqli_query($this->connect, $query);

        if ($ret > 0) {
            return true;
        } else {
            $_SESSION['message'] = 'Register Failed';
            return false;
        }
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