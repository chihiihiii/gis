<?php

require_once '../connect.php';

session_start();


if (isset($_POST['them'])) {

    $idct = trim($_POST['idct']);
    $tenkt = trim($_POST['tenkt']);
    $diachi = trim($_POST['diachi']);
    $longitude = trim($_POST['longitude']);
    $latitude = trim($_POST['latitude']);

    $sql = "INSERT INTO khutro (tenkt, diachi, longitude, latitude, idct) VALUES ('$tenkt', '$diachi', '$longitude', '$latitude','$idct')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Thêm khu trọ thành công';
        header('location: khutro.php');
    } else {
        $_SESSION['error'] = 'Thêm khu trọ thất bại';
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_POST['sua'])) {

    $idkt = trim($_POST['idkt']);
    $idct = trim($_POST['idct']);
    $tenkt = trim($_POST['tenkt']);
    $diachi = trim($_POST['diachi']);
    $longitude = trim($_POST['longitude']);
    $latitude = trim($_POST['latitude']);

    $sql = "UPDATE khutro SET tenkt='$tenkt', diachi='$diachi', longitude='$longitude', latitude='$latitude', idct='$idct' WHERE idkt=$idkt";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Cập nhật khu trọ thành công';
        header('location: khutro.php');
    } else {
        $_SESSION['error'] = 'Cập nhật khu trọ thất bại';
        echo "Error updating record: " . $conn->error;
    }
}
