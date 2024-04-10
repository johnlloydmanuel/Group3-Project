<?php
include('dbconn.php');

// Check if the delete parameter is set in the URL
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "UPDATE tblcapstone SET is_status = '0' WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    try {
        $stmt->execute();
        header("Location: home-admin.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

