<?php

include 'db.php';

$sql = "DELETE FROM `employee`";
if ($conn->multi_query($sql) === TRUE) {
    echo "OK";
    header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}