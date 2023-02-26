<?php

require_once '../connect.php';

session_start();


if (isset($_POST['them'])) {

    $idkt = trim($_POST['idkt']);
    $tenlp = trim($_POST['tenlp']);
    $songuoi = trim($_POST['songuoi']);
    $dientich = trim($_POST['dientich']);
    $gia = trim($_POST['gia']);

    if ($_SESSION['role'] == 1) {
        $sql1 = "SELECT * FROM khutro WHERE idkt=$idkt";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $idct = $row1['idct'];
        } else {
            $_SESSION['error'] = 'Không có khu trọ tương ứng';
            header('location: loaiphong.php');
        }
    } else {
        $idct = $_SESSION['id'];
    }

    $sql = "INSERT INTO loaiphong (tenlp, songuoi, dientich, gia, idkt, idct) VALUES ('$tenlp', '$songuoi', '$dientich', '$gia', '$idkt', '$idct')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Thêm loại phòng thành công';
    } else {
        $_SESSION['error'] = 'Thêm loại phòng thất bại';
        // echo "Error: " . $sql . "<br>" . $conn->error;

    }
    header('location: loaiphong.php');
    
} elseif (isset($_POST['sua'])) {

    $idlp = trim($_POST['idlp']);
    $idkt = trim($_POST['idkt']);
    $tenlp = trim($_POST['tenlp']);
    $songuoi = trim($_POST['songuoi']);
    $dientich = trim($_POST['dientich']);
    $gia = trim($_POST['gia']);

    $sql = "UPDATE loaiphong SET tenlp='$tenlp', songuoi='$songuoi', dientich='$dientich', gia='$gia', idkt='$idkt' WHERE idlp=$idlp";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Cập nhật loại phòng thành công';
    } else {
        $_SESSION['error'] = 'Cập nhật loại phòng thất bại';
        echo "Error updating record: " . $conn->error;
    }
    header('location: loaiphong.php');
}
