<link rel="stylesheet" href="bootstrap.min.css">

<?php
include('../functions/connection/dbconn.php');
include('../functions/admin/get-admin.php');

$fromdate = $_POST['from_date'] ?? null;
$todate = $_POST['to_date'] ?? null;

$searchVal = $_POST['forSearch'] ?? null;

if($searchVal == null && $fromdate == null && $todate == null){
    $stmt = $conn->prepare("SELECT * FROM tblcapstone");
}else if($fromdate == null && $todate == null){
    $stmt = $conn->prepare("SELECT * FROM tblcapstone
WHERE title LIKE '%$searchVal%'
");
}else if($searchVal != null && $fromdate != null && $todate != null){
    $stmt = $conn->prepare("SELECT * FROM tblcapstone
WHERE date_published BETWEEN '$fromdate' AND '$todate' AND title LIKE '%$searchVal%'
");
}else{
    $stmt = $conn->prepare("SELECT * FROM tblcapstone
WHERE date_published BETWEEN '$fromdate' AND '$todate'
");
}
$stmt->execute();
$searchCapstone = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>







                            
                        



