<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    include 'db.php';
    $sql = "INSERT INTO `employee`(`name`, `email`, `address`, `phone`) 
    VALUES ('$name','$email','$address','$phone')";

    if ($conn->multi_query($sql) === TRUE) {
        echo "Add successfully";
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
