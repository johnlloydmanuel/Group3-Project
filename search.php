<?php
include('dbconn.php');

if(isset($_POST['query'])){
    $query = $_POST['query'];
    
    $sql = "SELECT title FROM tblcapstone WHERE title LIKE :query";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
    
    try {
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($stmt->rowCount() > 0){
            foreach($result as $row){
                echo '<p>' . $row['title'] . '</p>';
            }
        } else {
            echo '<p>No matching titles found.</p>';
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
