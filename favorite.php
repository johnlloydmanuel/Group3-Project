<?php
include('dbconn.php');


if(isset($_GET['fave'])) {
    $id = $_GET['fave'];
    $sql = "UPDATE tblcapstone SET is_status = '2' WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    try {
        $stmt->execute();
        header("Location: home-user.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
