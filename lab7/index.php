<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .main {
            width: 1200px;
            margin: auto;
        }

        .tb-header {
            background-color: #344a6a;
            display: flex;
            justify-content: space-between;
            padding: 16px 32px;
        }

        .tb-header .name {
            color: #fff;
            font-weight: bold;
            font-size: 20px;
        }

        .table i {
            padding: 0 12px;
            cursor: pointer;
            color: yellow;
        }

        .table .delete i {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include 'db.php';
    ?>
    <div class="main">
        <div class="tb-header">
            <p class="name">
                Manage Employee
            </p>
            <div class="action">
                <a href="deleteAll.php"><button type="button" class="btn btn-danger">Delete</button></a>
                <a href="add.php"><button class="btn btn-success" type="submit">Add new employee</button></a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = "SELECT * FROM `employee`";
                $result = $conn->query($sql);

                $total = $result->num_rows;
                $limit = 1; 
                $page = ceil($total / $limit);
                $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($cur_page - 1) * $limit;

                $sql .= " LIMIT $start, $limit";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <th scope=\"row\">" . $row['id'] . "</th>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>  <a href=\"update.php?id=" . $row['id'] . "\"><i class=\"fa-solid fa-pen\"></i></a> <a class=\"delete\" href=\"delete.php?id=" . $row['id'] . "\"><i class=\"fa-solid fa-trash\"></i></a></td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example" >
            <ul class="pagination" style="justify-content:center">
                <?php if ($cur_page > 1) { ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $cur_page - 1; ?>"><<</a></li>
                <?php } ?>
                <?php
                for ($i = 1; $i <= $page; $i++) {
                ?>
                    <li class="page-item <?php echo ($cur_page == $i) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php
                }
                ?>
                <?php if ($cur_page < $page) { ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $cur_page + 1; ?>">>></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
