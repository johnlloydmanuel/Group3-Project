<?php 
include('dbconn.php');

if(isset($_POST['submit']) && isset($_POST['action']) && $_POST['action'] === 'add') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date_pub = $_POST['date_pub'];
    $abstract = $_POST['abstract'];

    $status = 1;

    $sql = "INSERT INTO tblcapstone (title, author, date_published, abstract, is_status) VALUES (:title, :author, :date_pub, :abstract ,:is_status)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':date_pub', $date_pub);
    $stmt->bindParam(':abstract', $abstract);

    $stmt->bindParam(':is_status', $status);



    try {
        $stmt->execute();
        header("Location: home-admin.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
