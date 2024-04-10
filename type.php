<link rel="stylesheet" href="bootstrap.min.css">

<?php
include('dbconn.php');
include('get.php');


$searchVal = $_POST['forSearch'] ?? null;

// Fetch all capstones from the database
$stmt = $conn->prepare("SELECT * FROM tblcapstone
WHERE title LIKE '%$searchVal%' 
");
$stmt->execute();
$searchCapstone = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>







                            
                        



