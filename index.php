<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2> List of customer</h2>
        <a class="btn btn-primary" href="/CSQUARE/insert.php" role="button">New Cstomer </a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id.</th>
                    <th>Title</th>
                    <th>First_Name</th>
                    <th>Middle_Name</th>
                    <th>Last_Name</th>
                    <th>Contact_No</th>
                    <th>District</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "assignment";

                //create connection
                $connection = new mysqli($servername,$username,$password,$database);

                //check connection
                if ($connection->connect_error) {
                    die("Connection faiiled:" .$connection->connect_error);
                }

                //read all row from db
                $sql = "SELECT * FROM customer";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                //read data of each row 
                while($row = $result->fetch_assoc()) {
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
                        <a class='btn btn-primary btn-sm' href='/CSQUARE/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/CSQUARE/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }
                ?>

                
            </tbody>
    </div>
</body>
</html>