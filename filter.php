<?php
include('dbconn.php');

if(isset[$_GET('submit')])
$stmt = $conn->prepare("SELECT * FROM tblcapstone WHERE is_status= '1';");
$stmt->execute();
$capstones = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>