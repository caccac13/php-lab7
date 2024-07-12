<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // echo $id;
    include 'db.php';
    $sql = "UPDATE `employee` SET `name`='$name',`email`='$email',`address`='$address',`phone`='$phone' WHERE id = ".$id."";

    if ($conn->multi_query($sql) === TRUE) {
        echo "Add successfully <br>";
        echo "<a href=\"index.php\">Home</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}