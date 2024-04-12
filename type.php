<link rel="stylesheet" href="bootstrap.min.css">

<?php
include('dbconn.php');
include('get-admin.php');


$searchVal = $_POST['forSearch'] ?? null;

// Fetch all capstones from the database
$stmt = $conn->prepare("SELECT * FROM tblcapstone
WHERE is_status = '1' AND title LIKE '%$searchVal%' OR is_status = '2' AND title LIKE '%$searchVal%'
");
$stmt->execute();
$searchCapstone = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
