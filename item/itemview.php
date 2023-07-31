<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="item.css"> 
</head>

   
            
       
<body>
<div>
        <h2 id ='iheader'>List of Item</h2>
        
        <button id='btnadd'><a href="/PHP-ERP-system/item/iadd.php" role="button">+ ADD</a></button>
        <table id ="itable" >
            <thead>
                <tr id="item1">
                    <th>Id</th>
                    <th>Item Code</th>
                    <th>Item Category</th>
                    <th>Item SubCategory</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
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
                $sql = "SELECT * FROM item";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // Read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[item_code]</td>
                    <td>$row[item_category]</td>
                    <td>$row[item_subcategory]</td>
                    <td>$row[item_name]</td>
                    <td>$row[quantity]</td>
                    <td>$row[unit_price]</td>
                    <td>
                        <button class='btnEi'><a href='/PHP-ERP-System/item/iedit.php?id=$row[id]'>Edit</a></button>
                        <button class='btnDi'><a href='/PHP-ERP-System/item/idelete.php?id=$row[id]'>Delete</a></button>


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
