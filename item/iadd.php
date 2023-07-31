<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "assignment";

// create connection
$connection = new mysqli($servername, $username, $password, $database);

$item_code = "";
$item_category = "";
$item_subcategory = "";
$item_name = "";
$quantity = "";
$unit_price = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_code = $_POST["item_code"];
    $item_category = $_POST["item_category"];
    $item_subcategory = $_POST["item_subcategory"];
    $item_name = $_POST["item_name"];
    $quantity = $_POST["quantity"];
    $unit_price = $_POST["unit_price"];

    do {
        if (empty($item_code) || empty($item_category) || empty($item_subcategory) || empty($item_name) || empty($quantity) || empty($unit_price)) {
            $errorMessage = "All the fields are required";
            break;
        }
        
        // add new item using prepared statement
        $sql = "INSERT INTO item (item_code, item_category, item_subcategory, item_name, quantity, unit_price) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssdd", $item_code, $item_category, $item_subcategory, $item_name, $quantity, $unit_price);
        
        if (!$stmt->execute()) {
            $errorMessage = "Invalid query: " . $stmt->error;
            break;
        }

        $item_code = "";
        $item_category = "";
        $item_subcategory = "";
        $item_name = "";
        $quantity = "";
        $unit_price = "";

        $errorMessage = "";
        $successMessage = "Item Added Successfully";

        header("location: /PHP-ERP-system/item/itemview.php");
        exit;

    } while (false);
}

?>


<!-- Rest of the HTML code remains the same -->




<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .col-sm-3 {
            flex-basis: calc(25% - 10px);
        }

        .d-grid {
            display: grid;
            place-items: center;
        }

        .submit,
        .canclebtn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        .submit {
            background-color: #007bff;
        }

        .canclebtn {
            background-color: #dc3545;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-warning {
            background-color: #ffc107;
            color: #333;
        }

        .btn-close {
            padding: 0 5px;
        }

        /* Responsive CSS */
        @media screen and (max-width: 600px) {
            .col-sm-3 {
                flex-basis: calc(50% - 10px);
            }
        }

        @media screen and (max-width: 480px) {
            .col-sm-3 {
                flex-basis: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container my-6">
        <h2 id="item1">Store Item</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
           

        <label for="icode">Item Code</label>
        <input type="text" id="fname" name="item_code" value="<?php echo $item_code; ?>">

            <label for="item_category">Item_Category</label>
            <select id="item_category" name="item_category">
                <option>...Select...</option>
                <option value="1">Printers</option>
                <option value="2">Laptops</option>
                <option value="3">Gajets</option>
                <option value="4">Ink bottels</option>
                <option value="5">Cartridges</option>
            </select> 

            <label for="item_subcategory">Item_Subcategory</label>
            <select id="item_subcategory" name="item_subcategory">
                <option>...Select...</option>
                <option value="1">Hp</option>
                <option value="2">Dell</option>
                <option value="3">Lenevo</option>
                <option value="4">Acer</option>
                <option value="5">Samsung</option>
            </select> 

            

            <label for="iname">Item Name</label>
            <input type="text" id="iname" name="item_name" value="<?php echo $item_name; ?>">

            <label for="cno">Quantity</label>
            <input type="text" id="qun" name="quantity" value="<?php echo $quantity; ?>">

            <label for="cno">Unit Price</label>
            <input type="text" id="uprice" name="unit_price" value="<?php echo $unit_price; ?>">

            

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="submit">Submit</button>
                </div>
                <div class="col-sm-3 col-sm-3 d-grid">
                    <button class='canclebtn'>Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
