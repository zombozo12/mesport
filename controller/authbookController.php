<?php

require "modal/authbookModel.php";

class authbookController
{
    public function __construct()
    {
        $this->model = new authbookModel();
    }

    public function index()
    {
        include_once('views/login.php');
    }

    public function loginUser()
    {
        $param = $_POST;

        $result = $this->model->loginUser($param);

        if ($result) {
            header('Location: home');
        } else {
            echo '<script>alert("' . $_SESSION['message'] . '"); window.location="login"; </script>';
        }
    }

    public function loginPemilik()
    {
        $param = $_POST;

        $result = $this->model->loginPemilik($param);

        if ($result) {
            header('Location: home');
        } else {
            echo '<script>alert("' . $_SESSION['message'] . '"); window.location="login"; </script>';
        }
    }

    public function register()
    {
        include_once('views/registerbook.php');
    }

    public function registerUser(){
        $param = $_POST;
        if ($param['password'] === $param['password2']) {
            $result = $this->model->registerUser($param);

            if ($result) {
                header('Location: home');
            } else {
                echo '<script>alert("' . $_SESSION['message'] . '")</script>';

            }
        } else {
            echo '<script>alert("Password not match!"); window.location="register"</script>';
        }
    }

    public function registerPemilik(){
        $param = $_POST;
        if ($param['password'] === $param['password2']) {
            $result = $this->model->registerPemilik($param);

            if ($result) {
                header('Location: home');
            } else {
                echo '<script>alert("' . $_SESSION['message'] . '")</script>';

            }
        } else {
            echo '<script>alert("Password not match!"); window.location="register"</script>';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        header('Location: home');
    }

    public function create()
    {
//        nothingToDo
    }

    public function store()
    {
//        nothingToDo
    }

    public function show()
    {
        include_once('views/editProfile.php');
    }

    public function update()
    {
        session_start();
        $param = $_POST;
        $param['id'] = $_SESSION['id'];

        $result = $this->model->updateProfile($param);

        if ($result) {
            echo '<script>alert("Berhasil Update Profile"); window.location="editProfile";</script>';
        } else {
            echo '<script>alert("' . $_SESSION['message'] . '");  window.location="editProfile";</script>';
        }
    }

    public function destroy()
    {
        if (!isset($_SESSION)) session_start();
        $id = $_SESSION['id'];
        $result = $this->model->delete($id);

        if ($result) {
            echo '<script>alert("Berhasil delete akun"); window.location="home";</script>';
            session_start();
            session_destroy();
        } else {
            echo '<script>alert("' . $_SESSION['message'] . '"); window.location="home";</script>';
        }
    }
}

?>