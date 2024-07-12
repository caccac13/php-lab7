<html>

<body>
    <?php
    include 'db.php';

    $sql = "SELECT * FROM `employee` WHERE id = " . $_REQUEST['id'] . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["email"] . "<br>";
            echo '
            <form action="xulyUpdate.php" method="post">
            Id: <input type="text" name="id" value="'.$row['id'].'" readonly><br><br>
            Name: <input type="text" name="name" value="'.$row['name'].'"><br><br>
            E-mail: <input type="email" name="email" value="'.$row['email'].'"><br><br>
            Address: <input type="text" name="address" value="'.$row['address'].'"><br><br>
            Phone: <input type="text" name="phone" value="'.$row['phone'].'"><br><br>
            <input type="submit" value="Update">
            </form>
            ';
        }
    } else {
        echo "0 results";
    }
    ?>
</body>

</html>