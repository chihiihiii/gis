<?php

require_once '../connect.php';

session_start();


if (isset($_POST['them'])) {

    $tenct = trim($_POST['tenct']);
    $sdt = trim($_POST['sdt']);
    $gioitinh = trim($_POST['gioitinh']);

    $sql = "INSERT INTO chutro (tenct, sdt, gioitinh) VALUES ('$tenct', '$sdt', '$gioitinh')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Thêm chủ trọ thành công';
        header('location: chutro.php');
    } else {
        $_SESSION['error'] = 'Thêm chủ trọ thất bại';
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_POST['sua'])) {
    $idct = trim($_POST['idct']);
    $tenct = trim($_POST['tenct']);
    $sdt = trim($_POST['sdt']);
    $gioitinh = trim($_POST['gioitinh']);

    $sql = "UPDATE chutro SET tenct='$tenct', sdt='$sdt', gioitinh='$gioitinh' WHERE idct=$idct";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Cập nhật chủ trọ thành công';
        header('location: chutro.php');
    } else {
        $_SESSION['error'] = 'Cập nhật chủ trọ thất bại';
        echo "Error updating record: " . $conn->error;
    }
}
