<?php
include('dbconn.php');

if(isset($_POST['submit']) && isset($_POST['action']) && $_POST['action'] === 'add') {
    $name = $_POST['name'];
    $studentId = $_POST['studentId'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =  $_POST['password'];

    $sql = "INSERT INTO tbl_register (name, studentId, username, email, password) VALUES (:name, :studentId, :username, :email ,:password)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':studentId', $studentId);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    try {
        $stmt->execute();
        header("Location: registerPage.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>