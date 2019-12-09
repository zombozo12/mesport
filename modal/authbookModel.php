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
        $email = mysqli_real_escape_string($this->connect, $params['email']);
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
        $email = mysqli_real_escape_string($this->connect, $params['email']);
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

        if ($this->checkUser($email)) {
            $_SESSION['message'] = "Email sudah terdaftar";
            return false;
        }

        if ($this->checkPemilik($email)) {
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

        if ($this->checkUser($email)) {
            $_SESSION['message'] = "Email sudah terdaftar";
            return false;
        }

        if ($this->checkPemilik($email)) {
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

    function checkUser($email)
    {
        $cUser = $this->connect->prepare('SELECT * FROM tbl_user WHERE email = ?');
        $cUser->bind_param('s', $email);
        $cUser->execute();
        $cUser->store_result();

        if ($cUser->num_rows == 0) {
            return false;
        }

        return true;
    }

    function checkPemilik($email)
    {
        $cUser = $this->connect->prepare('SELECT * FROM tbl_user WHERE email = ?');
        $cUser->bind_param('s', $email);
        $cUser->execute();
        $cUser->store_result();

        if ($cUser->num_rows == 0) {
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
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['kontak'] = $data['kontak'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['foto'] = $data['foto'];
        $_SESSION['role'] = 'user';
    }

    function sessionPemilik($data)
    {
        $query = "SELECT * FROM tbl_pemilik WHERE id='" . $data . "'";
        $ret = mysqli_query($this->connect, $query);
        $data = mysqli_fetch_assoc($ret);

        if (!isset($_SESSION)) session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['kontak'] = $data['kontak'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['foto'] = $data['foto'];
        $_SESSION['role'] = 'pemilik';
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

    function updateProfileUser($params, $files)
    {
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

    function updateProfilePemilik($params, $files)
    {
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

    function getAllLapangan()
    {

        $get = $this->connect->prepare('SELECT id, nama, jenis, lokasi, deskripsi, harga, kategori, foto FROM tbl_lapangan WHERE id_pemilik = ?');
        $get->bind_param('i', $_SESSION['id']);
        $get->execute();
        $get->store_result();

        if ($get->num_rows == 0) {
            $_SESSION['message'] = "Pemilik belum memiliki lapangan";
            return false;
        }

        $get->bind_result($id, $nama, $jenis, $lokasi, $deskripsi, $harga, $kategori, $foto);

        $lapangan = array();
        while ($row = $get->fetch()) {
            array_push($lapangan, [
                'id' => $id,
                'nama' => $nama,
                'jenis' => $jenis,
                'lokasi' => $lokasi,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'kategori' => $kategori,
                'foto' => $foto
            ]);
        }
        return $lapangan;
    }

    function getLapangan($id)
    {
        $idLapangan = mysqli_real_escape_string($this->connect, $id);

        $get = $this->connect->prepare('SELECT id, nama, jenis, lokasi, deskripsi, harga, kategori, foto FROM tbl_lapangan WHERE id = ? AND id_pemilik = ?');
        $get->bind_param('ii', $idLapangan, $_SESSION['id']);
        $get->execute();
        $get->store_result();

        if ($get->num_rows == 0) {
            $_SESSION['message'] = "Pemilik belum memiliki lapangan";
            return false;
        }

        $get->bind_result($id, $nama, $jenis, $lokasi, $deskripsi, $harga, $kategori, $foto);

        $lapangan = array();
        while ($row = $get->fetch()) {
            array_push($lapangan, [
                'id' => $id,
                'nama' => $nama,
                'jenis' => $jenis,
                'lokasi' => $lokasi,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'kategori' => $kategori,
                'foto' => $foto
            ]);
        }
        return $lapangan;
    }

    function getLapanganUser($id)
    {
        $idLapangan = mysqli_real_escape_string($this->connect, $id);

        $get = $this->connect->prepare('SELECT id, id_pemilik, nama, jenis, lokasi, deskripsi, harga, kategori, foto FROM tbl_lapangan WHERE id = ?');
        $get->bind_param('i', $idLapangan);
        $get->execute();
        $get->store_result();

        if ($get->num_rows == 0) {
            $_SESSION['message'] = "Pemilik belum memiliki lapangan";
            return false;
        }

        $get->bind_result($id, $id_pemilik, $nama, $jenis, $lokasi, $deskripsi, $harga, $kategori, $foto);

        $lapangan = array();
        while ($row = $get->fetch()) {
            array_push($lapangan, [
                'id' => $id,
                'id_pemilik' => $id_pemilik,
                'nama' => $nama,
                'jenis' => $jenis,
                'lokasi' => $lokasi,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'kategori' => $kategori,
                'foto' => $foto
            ]);
        }
        return $lapangan;
    }

    function cariLapangan($cari)
    {
        session_start();
        unset($_SESSION['lapangan']);
        $search = mysqli_real_escape_string($this->connect, "%{$cari['cari']}%");

        $get = $this->connect->prepare("SELECT id, nama, jenis, lokasi, deskripsi, harga, kategori, foto FROM tbl_lapangan WHERE nama LIKE CONCAT('%',?,'%')");
        $get->bind_param('s', $search);
        $get->execute();
        $get->store_result();

        if ($get->num_rows == 0) {
            $_SESSION['message'] = "lapangan tidak ditemukan";
            return false;
        }

        $get->bind_result($id, $nama, $jenis, $lokasi, $deskripsi, $harga, $kategori, $foto);

        $_SESSION['lapangan'] = array();
        while ($row = $get->fetch()) {
            array_push($_SESSION['lapangan'], [
                'id' => $id,
                'nama' => $nama,
                'jenis' => $jenis,
                'lokasi' => $lokasi,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'kategori' => $kategori,
                'foto' => $foto
            ]);
        }
        return $_SESSION['lapangan'];
    }

    function bookLapangan($params)
    {
        session_start();
        $idLapangan = mysqli_real_escape_string($this->connect, $params['idLapangan']);
        $start = mysqli_real_escape_string($this->connect, $params['start']);
        $end = mysqli_real_escape_string($this->connect, $params['end']);
        $idUser = mysqli_real_escape_string($this->connect, $_SESSION['id']);

        $bLap = $this->connect->prepare('INSERT INTO tbl_booking(id_pengguna, id_lapangan, start, end) VALUES(?,?,?,?)');
        $bLap->bind_param('iiss', $idUser, $idLapangan, $start, $end);
        $bLap->execute();
        $bLap->store_result();

        if ($bLap->affected_rows == 0) {
            $_SESSION['message'] = "gagal booking lapangan";
            return false;
        }

        $idBooking = $bLap->insert_id;
        $idPemilik = mysqli_real_escape_string($this->connect, $params['idPemilik']);
        $status = 'Pending';

        $aLap = $this->connect->prepare('INSERT INTO tbl_acc(id_pemilik, id_booking, status) VALUES(?,?,?)');
        $aLap->bind_param('iis', $idPemilik, $idBooking, $status);
        $aLap->execute();
        $aLap->store_result();

        if ($aLap->affected_rows == 0) {
            $_SESSION['message'] = "gagal memasukan konfirmasi";
            return false;
        }

        return true;
    }

    function tambahLapangan($params, $files)
    {
        session_start();

        $idPemilik = mysqli_real_escape_string($this->connect, $_SESSION['id']);
        $nama = mysqli_real_escape_string($this->connect, $params['nama']);
        $jenis = mysqli_real_escape_string($this->connect, $params['jenis']);
        $lokasi = mysqli_real_escape_string($this->connect, $params['lokasi']);
        $deskripsi = mysqli_real_escape_string($this->connect, $params['deskripsi']);
        $harga = mysqli_real_escape_string($this->connect, $params['harga']);
        $kategori = mysqli_real_escape_string($this->connect, $params['kategori']);

        $namaFoto = $this->generateRandomString() . '.' . pathinfo($files['foto']['name'], PATHINFO_EXTENSION);
        $tmpFoto = $files['foto']['tmp_name'];
        $pathDir = 'Assets/img/';

        $upload = move_uploaded_file($tmpFoto, $pathDir . $namaFoto);

        if (!$upload) {
            echo '<script>alert("file upload gagal");</script>';
        }

        $tLapangan = $this->connect->prepare('INSERT INTO tbl_lapangan(id_pemilik, nama, jenis, lokasi, deskripsi, harga, kategori, foto) VALUES(?,?,?,?,?,?,?,?)');
        $tLapangan->bind_param('issssiss', $idPemilik, $nama, $jenis, $lokasi, $deskripsi, $harga, $kategori, $namaFoto);
        $tLapangan->execute();
        $tLapangan->store_result();

        if ($tLapangan->affected_rows == 0) {
            $_SESSION['message'] = "gagal menambahkan lapangan";
            return false;
        }

        return true;
    }

    function updateLapangan($params, $files)
    {
        session_start();

        $idLapangan = mysqli_real_escape_string($this->connect, $params['idLapangan']);
        $idPemilik = mysqli_real_escape_string($this->connect, $_SESSION['id']);
        $nama = mysqli_real_escape_string($this->connect, $params['nama']);
        $jenis = mysqli_real_escape_string($this->connect, $params['jenis']);
        $lokasi = mysqli_real_escape_string($this->connect, $params['lokasi']);
        $deskripsi = mysqli_real_escape_string($this->connect, $params['deskripsi']);
        $harga = mysqli_real_escape_string($this->connect, $params['harga']);
        $kategori = mysqli_real_escape_string($this->connect, $params['kategori']);

        $namaFoto = $this->generateRandomString() . '.' . pathinfo($files['foto']['name'], PATHINFO_EXTENSION);
        $tmpFoto = $files['foto']['tmp_name'];
        $pathDir = 'Assets/img/';

        $upload = move_uploaded_file($tmpFoto, $pathDir . $namaFoto);

        if (!$upload) {
            echo '<script>alert("file upload gagal");</script>';
        }

        $uLapangan = $this->connect->prepare('UPDATE tbl_lapangan SET nama = ?, jenis = ?, lokasi = ?, deskripsi = ?, harga = ?, kategori = ?, foto = ? WHERE id = ? AND id_pemilik = ?');
        $uLapangan->bind_param('ssssissii', $nama, $jenis, $lokasi, $deskripsi, $harga, $kategori, $namaFoto, $idLapangan, $idPemilik);
        $uLapangan->execute();
        $uLapangan->store_result();

        if ($uLapangan->affected_rows == 0) {
            $_SESSION['message'] = "gagal merubah lapangan";
            return false;
        }

        return true;
    }

    function historyUser(){
        $idUser = mysqli_real_escape_string($this->connect, $_SESSION['id']);

        $hUser = $this->connect->prepare(
            'SELECT tbl_lapangan.nama, tbl_booking.start, tbl_booking.end, tbl_acc.status FROM tbl_booking
                INNER JOIN tbl_lapangan ON tbl_lapangan.id = tbl_booking.id_lapangan
                INNER JOIN tbl_acc ON tbl_acc.id_booking = tbl_booking.id
                WHERE tbl_booking.id_pengguna = ?'
        );
        $hUser->bind_param('i', $idUser);
        $hUser->execute();
        $hUser->store_result();

        if($hUser->num_rows == 0){
            $_SESSION['message'] = "gagal merubah lapangan";
            return false;
        }

        $hUser->bind_result($nama_lapangan, $book_start, $book_end, $acc_status);

        $histori = array();
        while ($hUser->fetch()) {
            array_push($histori, [
                'nama_lapangan' => $nama_lapangan,
                'book_start' => $book_start,
                'book_end' => $book_end,
                'acc_status' => $acc_status,
            ]);
        }
        return $histori;

    }

    function historyPesanan(){
        $hPemilik = $this->connect->prepare('SELECT tbl_lapangan.nama, tbl_booking.start, tbl_booking.end, tbl_acc.status FROM tbl_acc
            JOIN tbl_booking ON tbl_booking.id = tbl_acc.id_booking
            JOIN tbl_lapangan ON tbl_lapangan.id = tbl_booking.id_lapangan
            WHERE tbl_acc.id_pemilik = ?');
        $hPemilik->bind_param('i', $_SESSION['id']);
        $hPemilik->execute();
        $hPemilik->store_result();

        if($hPemilik->num_rows == 0){
            $_SESSION['message'] = "gagal merubah lapangan";
            return false;
        }

        $hPemilik->bind_result($nama_lapangan, $book_start, $book_end, $acc_status);

        $histori = array();
        while ($hPemilik->fetch()) {
            array_push($histori, [
                'nama_lapangan' => $nama_lapangan,
                'book_start' => $book_start,
                'book_end' => $book_end,
                'acc_status' => $acc_status,
            ]);
        }
        return $histori;
    }

    function pesananMasuk(){
        $status = 'Pending';
        $hPemilik = $this->connect->prepare('SELECT tbl_acc.id, tbl_lapangan.nama, tbl_booking.start, tbl_booking.end, tbl_acc.status, tbl_user.nama FROM tbl_acc
            JOIN tbl_booking ON tbl_booking.id = tbl_acc.id_booking
            JOIN tbl_lapangan ON tbl_lapangan.id = tbl_booking.id_lapangan
            JOIN tbl_user ON tbl_user.id = tbl_booking.id_pengguna
            WHERE tbl_acc.id_pemilik = ? AND tbl_acc.status = ?');
        $hPemilik->bind_param('is', $_SESSION['id'], $status);
        $hPemilik->execute();
        $hPemilik->store_result();

        if($hPemilik->num_rows == 0){
            $_SESSION['message'] = "gagal merubah lapangan";
            return false;
        }

        $hPemilik->bind_result($id_acc, $nama_lapangan, $book_start, $book_end, $acc_status, $nama_pengguna);

        $histori = array();
        while ($hPemilik->fetch()) {
            array_push($histori, [
                'id_acc' => $id_acc,
                'nama_lapangan' => $nama_lapangan,
                'book_start' => $book_start,
                'book_end' => $book_end,
                'acc_status' => $acc_status,
                'nama_pengguna' => $nama_pengguna
            ]);
        }
        return $histori;
    }

    function ubahStatusPesanan($id, $status){
        $id     = mysqli_real_escape_string($this->connect, $id);

        $uStatus = $this->connect->prepare('UPDATE tbl_acc SET status = ? WHERE id = ?');
        $uStatus->bind_param('si', $status, $id);
        $uStatus->execute();
        $uStatus->store_result();

        if($uStatus->affected_rows == 0){
            $_SESSION['message'] = "gagal merubah status";
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