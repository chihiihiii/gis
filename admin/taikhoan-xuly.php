<?php

require_once '../connect.php';

session_start();


if (isset($_POST['dangky'])) {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['error'] = 'Đăng ký thất bại. Tên đăng nhập đã tồn tại!';
        header('location: dangky.php');
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = 'Đăng ký thành công';
            header('location: dangnhap.php');
        } else {
            $_SESSION['error'] = 'Đăng ký thất bại';
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} elseif (isset($_POST['dangnhap'])) {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));

    $sql = "SELECT * FROM chutro WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    // var_dump($result);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['idct'];
        $_SESSION['role'] = 0;
        $_SESSION['success'] = 'Đăng nhập thành công';
        header('location: index.php');
    } else {
        $_SESSION['error'] = 'Thông tin đăng nhập không chính xác';
        header('location: dangnhap.php');
        // echo 'hi';
    }
} elseif (isset($_POST['dangnhap_admin'])) {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    // var_dump($result);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = 1;
        $_SESSION['success'] = 'Đăng nhập thành công';
        header('location: index.php');
    } else {
        $_SESSION['error'] = 'Thông tin đăng nhập không chính xác';
        header('location: dangnhap-admin.php');
        // echo 'hi';
    }
}
