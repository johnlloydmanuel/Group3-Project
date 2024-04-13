<link rel="stylesheet" href="bootstrap.min.css">

<?php
include('../functions/connection/dbconn.php');
include('../functions/admin/get-admin.php');


$fromdate = $_POST['from_date'] ?? null;
$todate = $_POST['to_date'] ?? null;

// Fetch all capstones from the database
$stmt = $conn->prepare("SELECT * FROM tblcapstone
WHERE date_published BETWEEN '$fromdate' AND '$todate'
");
$stmt->execute();
$searchCapstone = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>







                            
                        



