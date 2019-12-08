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

        if ($login->num_rows == 0) {
            $_SESSION['message'] = 'Write your username or password correctly!';
            return false;
        }

        while ($login->fetch()) {
            $this->sessionUser($id);
        }

        return true;
    }

    function loginPemilik($params)
    {
        $email    = mysqli_real_escape_string($this->connect, $params['email']);
        $password = mysqli_real_escape_string($this->connect, $params['password']);
        $password = md5($password);

        $login = $this->connect->prepare("SELECT id FROM tbl_pemilik WHERE email = ? AND password = ?");
        $login->bind_param('ss', $email, $password);
        $login->execute();
        $login->store_result();
        $login->bind_result($id);

        if ($login->num_rows == 0) {
            $_SESSION['message'] = 'Write your username or password correctly!';
            return false;
        }

        while ($login->fetch()) {
            $this->sessionPemilik($id);
        }

        return true;
    }

    function registerPemilik($params)
    {
        $nama = mysqli_real_escape_string($this->connect, $params['nama']);
        $nohp = mysqli_real_escape_string($this->connect, $params['nohp']);
        $email = mysqli_real_escape_string($this->connect, $params['email']);
        $password = mysqli_real_escape_string($this->connect, $params['password']);
        $password = md5($password);
        $jenis_kelamin = mysqli_real_escape_string($this->connect, $params['jenis_kelamin']);

        if($this->checkUser($email)){
            $_SESSION['message'] = "Email sudah terdaftar";
            return false;
        }

        if($this->checkPemilik($email)){
            $_SESSION['message'] = "Email sudah terdaftar";
            return false;
        }

        $rPemilik = $this->connect->prepare("INSERT INTO tbl_pemilik (nama, kontak, email, password, jenis_kelamin) VALUES(?,?,?,?,?)");
        $rPemilik->bind_param('sisss', $nama, $nohp, $email, $password, $jenis_kelamin);
        $rPemilik->execute();
        $rPemilik->store_result();
        if ($rPemilik->affected_rows == 0) {
            $_SESSION['message'] = "Regristrasi Gagal";
            return false;
        }
        return true;
    }

    function registerUser($params)
    {
        $nama = mysqli_real_escape_string($this->connect, $params['nama']);
        $nohp = mysqli_real_escape_string($this->connect, $params['nohp']);
        $email = mysqli_real_escape_string($this->connect, $params['email']);
        $password = mysqli_real_escape_string($this->connect, $params['password']);
        $password = md5($password);
        $jenis_kelamin = mysqli_real_escape_string($this->connect, $params['jenis_kelamin']);

        if($this->checkUser($email)){
            $_SESSION['message'] = "Email sudah terdaftar";
            return false;
        }

        if($this->checkPemilik($email)){
            $_SESSION['message'] = "Email sudah terdaftar";
            return false;
        }

        $rUser = $this->connect->prepare("INSERT INTO tbl_user (nama, kontak, email, password, jenis_kelamin) VALUES(?,?,?,?,?)");
        $rUser->bind_param('sisss', $nama, $nohp, $email, $password, $jenis_kelamin);
        $rUser->execute();
        $rUser->store_result();
        if ($rUser->affected_rows == 0) {
            $_SESSION['message'] = "Regristrasi Gagal";
            return false;
        }
        return true;
    }

    function checkUser($email){
        $cUser = $this->connect->prepare('SELECT * FROM tbl_user WHERE email = ?');
        $cUser->bind_param('s', $email);
        $cUser->execute();
        $cUser->store_result();

        if($cUser->num_rows == 0){
            return false;
        }

        return true;
    }

    function checkPemilik($email){
        $cUser = $this->connect->prepare('SELECT * FROM tbl_user WHERE email = ?');
        $cUser->bind_param('s', $email);
        $cUser->execute();
        $cUser->store_result();

        if($cUser->num_rows == 0){
            return false;
        }

        return true;
    }

    function sessionUser($data)
    {
        $query = "SELECT * FROM tbl_user WHERE id='" . $data . "'";
        $ret = mysqli_query($this->connect, $query);
        $data = mysqli_fetch_assoc($ret);

        if (!isset($_SESSION)) session_start();
        $_SESSION['id']     = $data['id'];
        $_SESSION['nama']   = $data['nama'];
        $_SESSION['kontak'] = $data['kontak'];
        $_SESSION['email']  = $data['email'];
        $_SESSION['foto']   = $data['foto'];
        $_SESSION['role']   = 'user';
    }

    function sessionPemilik($data)
    {
        $query = "SELECT * FROM tbl_pemilik WHERE id='" . $data . "'";
        $ret = mysqli_query($this->connect, $query);
        $data = mysqli_fetch_assoc($ret);

        if (!isset($_SESSION)) session_start();
        $_SESSION['id']     = $data['id'];
        $_SESSION['nama']   = $data['nama'];
        $_SESSION['kontak'] = $data['kontak'];
        $_SESSION['email']  = $data['email'];
        $_SESSION['foto']   = $data['foto'];
        $_SESSION['role']   = 'pemilik';
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function updateProfileUser($params, $files){
        session_start();
        $nama = mysqli_real_escape_string($this->connect, $params['nama']);
        $nohp = mysqli_real_escape_string($this->connect, $params['nohp']);
        $email = mysqli_real_escape_string($this->connect, $params['email']);
        $password = mysqli_real_escape_string($this->connect, $params['password']);
        $password = md5($password);
        //$jenis_kelamin  = mysqli_real_escape_string($this->connect, $params['jenis_kelamin']);
        $namaFoto = $this->generateRandomString() . '.' . pathinfo($files['foto']['name'], PATHINFO_EXTENSION);
        $tmpFoto = $files['foto']['tmp_name'];
        $pathDir = 'Assets/img/';
        $upload = move_uploaded_file($tmpFoto, $pathDir . $namaFoto);

        if (!$upload) {
            echo '<script>alert("file upload gagal");</script>';
        }

        $updateUser = $this->connect->prepare('UPDATE tbl_user SET nama = ?, kontak = ?, email = ?, password = ?, foto = ? WHERE id = ?');
        $updateUser->bind_param('sisssi', $nama, $nohp, $email, $password, $namaFoto, $_SESSION['id']);
        $updateUser->execute();
        $updateUser->store_result();

        if ($updateUser->affected_rows == 0) {
            $_SESSION['message'] = 'Gagal melakukan update';
            return false;
        }

        $this->sessionUser($_SESSION['id']);
        return true;
    }

    function updateProfilePemilik($params, $files){
        session_start();
        $nama = mysqli_real_escape_string($this->connect, $params['nama']);
        $nohp = mysqli_real_escape_string($this->connect, $params['nohp']);
        $email = mysqli_real_escape_string($this->connect, $params['email']);
        $password = mysqli_real_escape_string($this->connect, $params['password']);
        $password = md5($password);
        //$jenis_kelamin  = mysqli_real_escape_string($this->connect, $params['jenis_kelamin']);
        $namaFoto = $this->generateRandomString() . '.' . pathinfo($files['foto']['name'], PATHINFO_EXTENSION);
        $tmpFoto = $files['foto']['tmp_name'];
        $pathDir = 'Assets/img/';
        $upload = move_uploaded_file($tmpFoto, $pathDir . $namaFoto);

        if (!$upload) {
            echo '<script>alert("file upload gagal");</script>';
        }

        $updateUser = $this->connect->prepare('UPDATE tbl_pemilik SET nama = ?, kontak = ?, email = ?, password = ?, foto = ? WHERE id = ?');
        $updateUser->bind_param('sisssi', $nama, $nohp, $email, $password, $namaFoto, $_SESSION['id']);
        $updateUser->execute();
        $updateUser->store_result();

        if ($updateUser->affected_rows == 0) {
            $_SESSION['message'] = 'Gagal melakukan update';
            return false;
        }

        $this->sessionPemilik($_SESSION['id']);
        return true;
    }

    function getAllLapangan(){

        $get = $this->connect->prepare('SELECT id, nama, jenis, lokasi, deskripsi, harga, kategori, foto FROM tbl_lapangan WHERE id_pemilik = ?');
        $get->bind_param('i', $_SESSION['id']);
        $get->execute();
        $get->store_result();

        if($get->num_rows == 0){
            $_SESSION['message'] = "Pemilik belum memiliki lapangan";
            return false;
        }

        $get->bind_result($id, $nama, $jenis, $lokasi, $deskripsi, $harga, $kategori, $foto);

        $lapangan = array();
        while($row = $get->fetch()){
            array_push($lapangan, [
                'id' => $id,
                'nama' => $nama,
                'jenis' => $jenis,
                'lokasi' => $lokasi,
                'deskripsi' => $deskripsi,
                'harga' => $kategori,
                'foto' => $foto
            ]);
        }
        return $lapangan;
    }

    function tambahLapangan($params, $files){
        session_start();

        $idPemilik  = mysqli_real_escape_string($this->connect, $_SESSION['id']);
        $nama       = mysqli_real_escape_string($this->connect, $params['nama']);
        $jenis      = mysqli_real_escape_string($this->connect, $params['jenis']);
        $lokasi     = mysqli_real_escape_string($this->connect, $params['lokasi']);
        $deskripsi  = mysqli_real_escape_string($this->connect, $params['deskripsi']);
        $harga      = mysqli_real_escape_string($this->connect, $params['harga']);
        $kategori   = mysqli_real_escape_string($this->connect, $params['kategori']);

        $namaFoto   = $this->generateRandomString() . '.' . pathinfo($files['foto']['name'], PATHINFO_EXTENSION);
        $tmpFoto    = $files['foto']['tmp_name'];
        $pathDir    = 'Assets/img/';

        $upload = move_uploaded_file($tmpFoto, $pathDir . $namaFoto);

        if (!$upload) {
            echo '<script>alert("file upload gagal");</script>';
        }

        $tLapangan = $this->connect->prepare('INSERT INTO tbl_lapangan(id_pemilik, nama, jenis, lokasi, deskripsi, harga, kategori, foto) VALUES(?,?,?,?,?,?,?,?)');
        $tLapangan->bind_param('issssiss', $idPemilik, $nama, $jenis, $lokasi, $deskripsi, $harga, $kategori, $namaFoto);
        $tLapangan->execute();
        $tLapangan->store_result();

        if($tLapangan->num_rows != 0){
            $_SESSION['message'] = "gagal menambahkan lapangan";
            return false;
        }

        return true;
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