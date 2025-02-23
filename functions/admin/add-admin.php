<?php
include('../functions/connection/dbconn.php');

if(isset($_POST['submit']) && isset($_POST['action']) && $_POST['action'] === 'add') {
    // Your existing form data retrieval
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date_pub = $_POST['date_pub'];
    $abstract = $_POST['abstract'];
    $status = 1;

    // File upload handling
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];
    $file_destination = '../uploads/' . $file_name;

    move_uploaded_file($file_tmp, $file_destination);

    // Insert data into database
    $sql = "INSERT INTO tblcapstone (title, author, date_published, abstract, pdf_file, is_status) 
            VALUES (:title, :author, :date_pub, :abstract, :pdf_file, :is_status)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':date_pub', $date_pub);
    $stmt->bindParam(':abstract', $abstract);
    $stmt->bindParam(':pdf_file', $file_destination); // Store the file path
    $stmt->bindParam(':is_status', $status);

    try {
        $stmt->execute();
        header("Location: ../pages/home-admin.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
