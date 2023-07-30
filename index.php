<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

</head>

   
            
       
<body>
<div class="container my-5">
        <h2>List of Customers</h2>
        <a class="btn btn-primary mb-3" href="/PHP-ERP-system/insert.php" role="button">New Customer</a>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Contact No</th>
                    <th>District</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody style ="color:aqua";>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "assignment";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Read all rows from the database
                $sql = "SELECT * FROM customer";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // Read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[title]</td>
                    <td>$row[first_name]</td>
                    <td>$row[middle_name]</td>
                    <td>$row[last_name]</td>
                    <td>$row[contact_no]</td>
                    <td>$row[district]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/PHP-ERP-System/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/PHP-ERP-System/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
