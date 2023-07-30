<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="style.css"> 
</head>

   
            
       
<body>
<div>
        <h2 id ='csheader'>List of Customers</h2>
        <button id='btnadd'><a href="/PHP-ERP-system/insert.php" role="button">+ ADD</a></button>
        <table id ="cstable" >
            <thead>
                <tr id="custr">
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
            <tbody>
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
                        <button class='btnE'><a href='/PHP-ERP-System/edit.php?id=$row[id]'>Edit</a></button>
                        <button class='btnD'<a class='btn btn-danger btn-sm' href='/PHP-ERP-System/delete.php?id=$row[id]'>Delete</a></button>
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
