<?php
include_once('navbar.php');
error_reporting(1);
include '../conn/database.php';
include "../modal/authbookModel.php";
$model = new authbookModel();

$id=$data['id'];
function delete($id)
    {
        $query = "DELETE FROM tbl_lapangan WHERE id='" . $id . "'";
        $ret = mysqli_query($this->connect, $query);

        if ($ret > 0) {
            return true;
        } else {
            $_SESSION['message'] = 'Gagal delete lapangan';
            return false;
        }
    }

