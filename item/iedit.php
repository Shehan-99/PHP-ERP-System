<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "assignment";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$item_code = "";
$item_category = "";
$item_subcategory = "";
$item_name = "";
$quantity = "";
$unit_price = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get method to show the data of the client
    if (!isset($_GET["id"])) {
        header("location: /PHP-ERP-System/item/itemview.php");
        exit;
    }
    $id = $_GET["id"];

    // Read the row of the selected customer from the database table
    $sql = "SELECT * FROM item WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /PHP-ERP-System/index.php");
        exit;
    }

    $item_code = $row["item_code"];
    $item_category = $row["item_category"];
    $item_subcategory = $row["item_subcategory"];
    $item_name = $row["item_name"];
    $quantity  = $row["quantity"];
    $unit_price = $row["unit_price"];
} else {
    // Make sure to get the 'id' from the form submission
    $id = $_POST["id"];
    $item_code = $_POST["item_code"];
    $item_category = $_POST["item_category"];
    $item_subcategory = $_POST["item_subcategory"];
    $item_name = $_POST["item_name"];
    $quantity = $_POST["quantity"];
    $unit_price = $_POST["unit_price"];

    if (empty($item_code) || empty($item_category) || empty($item_subcategory) || empty($item_name) || empty($quantity) || empty($unit_price)) {
        $errorMessage = "All the fields are required";
    } else {
        $sql = "UPDATE item " .
            "SET item_code='$item_code', item_category='$item_category', item_subcategory='$item_subcategory', item_name='$item_name', quantity='$quantity', unit_price='$unit_price' " .
            "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
        } else {
            $successMessage = "Item updated correctly";
            header("location: /PHP-ERP-system/item/itemview.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
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
    <div class="container my-5">
        <h2>Update Item</h2>

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
            <label for="item_code">Item Code</label>
            <input type="text" id="item_code" name="item_code" value="<?php echo $item_code; ?>">

            <label for="item_category">Item Category</label>
            <select id="item_category" name="item_category">
                <option value="">...Select...</option>
                <option value="1" <?php if ($item_category == '1') echo 'selected'; ?>>Printers</option>
                <option value="2" <?php if ($item_category == '2') echo 'selected'; ?>>Laptops</option>
                <option value="3" <?php if ($item_category == '3') echo 'selected'; ?>>Gadgets</option>
                <option value="4" <?php if ($item_category == '4') echo 'selected'; ?>>Ink bottles</option>
                <option value="5" <?php if ($item_category == '5') echo 'selected'; ?>>Cartridges</option>
            </select>

            <label for="item_subcategory">Item Subcategory</label>
            <select id="item_subcategory" name="item_subcategory">
                <option value="">...Select...</option>
                <option value="1" <?php if ($item_subcategory == '1') echo 'selected'; ?>>Hp</option>
                <option value="2" <?php if ($item_subcategory == '2') echo 'selected'; ?>>Dell</option>
                <option value="3" <?php if ($item_subcategory == '3') echo 'selected'; ?>>Lenovo</option>
                <option value="4" <?php if ($item_subcategory == '4') echo 'selected'; ?>>Acer</option>
                <option value="5" <?php if ($item_subcategory == '5') echo 'selected'; ?>>Samsung</option>
            </select>

            <label for="item_name">Item Name</label>
            <input type="text" id="item_name" name="item_name" value="<?php echo $item_name; ?>">

            <label for="quantity">Quantity</label>
            <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>">

            <label for="unit_price">Unit Price</label>
            <input type="text" id="unit_price" name="unit_price" value="<?php echo $unit_price; ?>">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 col-sm-3 d-grid">
                    <a class="btn btn-primary" href="/PHP-ERP-system/item/itemview.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
