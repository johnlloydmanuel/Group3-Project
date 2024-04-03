<?php
include('dbconn.php');

// Fetch all capstones from the database
$stmt = $conn->prepare("SELECT * FROM tblcapstone");
$stmt->execute();
$capstones = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Edit capstone
if(isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM tblcapstone WHERE id=:edit_id");
    $stmt->bindParam(':edit_id', $edit_id);
    $stmt->execute();
    $capstone = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Submit form for adding new capstone
if(isset($_POST['submit']) && isset($_POST['action']) && $_POST['action'] === 'add') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date_pub = $_POST['date_pub'];
    $abstract = $_POST['abstract'];

    $sql = "INSERT INTO tblcapstone (title, author, date_published, abstract) VALUES (:title, :author, :date_pub, :abstract)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':date_pub', $date_pub);
    $stmt->bindParam(':abstract', $abstract);

    try {
        $stmt->execute();
        header("Location: index.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Submit form for editing existing capstone
if(isset($_POST['submit']) && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date_pub = $_POST['date_pub'];
    $abstract = $_POST['abstract'];
    $id = $_POST['edit_id'];

    $sql = "UPDATE tblcapstone SET title=:title, author=:author, date_published=:date_pub, abstract=:abstract WHERE id=:id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':date_pub', $date_pub);
    $stmt->bindParam(':abstract', $abstract);
    $stmt->bindParam(':id', $id);

    try {
        $stmt->execute();
        header("Location: index.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Delete capstone
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM tblcapstone WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    try {
        $stmt->execute();
        header("Location: index.php");
        exit;
    } catch(PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-4">Add here <!-- LEFT PART-->
                <h1 class="mb-4">Capstone Management</h1>
                <form method="POST">
                    <input type="hidden" name="action" value="add">
                    <input type="hidden" name="edit_id" id="edit_id" value="">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>
                    <div class="form-group">
                        <label for="date_pub">Date Published:</label>
                        <input type="date" class="form-control" id="date_pub" name="date_pub" required>
                    </div>
                    <div class="form-group">
                        <label for="abstract">Abstract:</label>
                        <textarea class="form-control" id="abstract" name="abstract" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
            <div class="col-6">Browse here <!-- EDIT VIEW PART -->
                <div class="row mt-5">
                    <?php foreach($capstones as $capstone): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $capstone['title']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $capstone['author']; ?></h6>
                                    <p class="card-text"><?php echo $capstone['date_published']; ?></p>
                                    <p class="card-text"><?php echo $capstone['abstract']; ?></p>
                                    <button type="button" class="btn btn-warning edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo $capstone['id']; ?>">Edit</button> <!--DIKO MAPAGANA-->
                                    <a href="?delete=<?php echo $capstone['id']; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<!-- Modal for Editing -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Capstone</h5>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>
      <form id="editForm" method="POST">
        <div class="modal-body">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="edit_id" id="edit_id_modal">
          <div class="form-group">
            <label for="title_modal">Title:</label>
            <input type="text" class="form-control" id="title_modal" name="title" required>
          </div>
          <div class="form-group">
            <label for="author_modal">Author:</label>
            <input type="text" class="form-control" id="author_modal" name="author" required>
          </div>
          <div class="form-group">
            <label for="date_pub_modal">Date Published:</label>
            <input type="date" class="form-control" id="date_pub_modal" name="date_pub" required>
          </div>
          <div class="form-group">
            <label for="abstract_modal">Abstract:</label>
            <textarea class="form-control" id="abstract_modal" name="abstract" rows="4" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
<script>
    // HINDI NAGPAPAKITA ANG IEEDIT NA INFORMATION
document.addEventListener("DOMContentLoaded", function() {
  // Get all edit buttons
  var editButtons = document.querySelectorAll(".edit-btn");

  // Add click event listener to each edit button
  editButtons.forEach(function(button) {
    button.addEventListener("click", function() {
      var capstoneId = button.getAttribute("data-id");

      // Fetch capstone data
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var capstoneData = JSON.parse(xhr.responseText);
            document.getElementById("edit_id_modal").value = capstoneData.id;
            document.getElementById("title_modal").value = capstoneData.title;
            document.getElementById("author_modal").value = capstoneData.author;
            document.getElementById("date_pub_modal").value = capstoneData.date_published;
            document.getElementById("abstract_modal").value = capstoneData.abstract;
          } else {
            console.error("Request failed with status:", xhr.status);
          }
        }
      };
      xhr.open("GET", "index.php?edit=" + capstoneId, true);
      xhr.send();
    });
  });
});
</script>
</html>
