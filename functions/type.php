<?php
include('../functions/connection/dbconn.php');
include('../functions/admin/get-admin.php');

$fromdate = $_POST['from_date'] ?? null;
$todate = $_POST['to_date'] ?? null;

$searchVal = $_POST['forSearch'] ?? null;

if($searchVal == null && $fromdate == null && $todate == null){
    $stmt = $conn->prepare("SELECT * FROM tblcapstone WHERE is_status = '1'");
}else if($fromdate == null && $todate == null){
    $stmt = $conn->prepare("SELECT * FROM tblcapstone
WHERE title LIKE '%$searchVal%' AND is_status = '1'");
}else if($searchVal != null && $fromdate != null && $todate != null){
    $stmt = $conn->prepare("SELECT * FROM tblcapstone
WHERE date_published BETWEEN '$fromdate' AND '$todate' AND title LIKE '%$searchVal%' AND is_status = '1'");
}else{
    $stmt = $conn->prepare("SELECT * FROM tblcapstone
WHERE date_published BETWEEN '$fromdate' AND '$todate' AND is_status = '1'");
}
$stmt->execute();
$searchCapstone = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
