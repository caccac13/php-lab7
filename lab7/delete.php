<?php
// echo $_REQUEST['id'];

include 'db.php';

$sql = "DELETE FROM `employee` WHERE id = ".$_REQUEST['id']."";
if ($conn->multi_query($sql) === TRUE) {
    echo "Remove successfully";
    header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

