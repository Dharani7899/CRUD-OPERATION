<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM crud2 WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            // Deletion successful
            echo "<script>alert('Deleted successfully');</script>";
        } else {
            // Error occurred
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    // Redirect back to index.php after deletion
    header('Location: index.php');
    exit;
?>
