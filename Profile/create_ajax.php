<?php
include "connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = strtoupper($_POST['name']);
    $email = strtoupper($_POST['email']);
    $phone = strtoupper($_POST['phone']);
    $address = strtoupper($_POST['address']);

    $sql = "INSERT INTO crud2 (name, email, phone, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $address);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
