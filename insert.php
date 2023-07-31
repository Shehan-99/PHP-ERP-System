<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "assignment";

// create connection
$connection = new mysqli($servername, $username, $password, $database);

$title = "";
$first_name = "";
$middle_name = "";
$last_name = "";
$contact_no = "";
$district = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST["title"];
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $contact_no = $_POST["contact_no"];
    $district = $_POST["district"];

    do {
        if (empty($title) || empty($first_name) || empty($middle_name) || empty($last_name) || empty($contact_no) || empty($district)) {
            $errorMessage = "All the fields are required";
            break;
        }
        // add new customer
        $sql = "INSERT INTO customer(title,first_name,middle_name,last_name,contact_no,district)" .
            "VALUES ('$title','$first_name','$middle_name','$last_name','$contact_no','$district')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $title = "";
        $first_name = "";
        $middle_name = "";
        $last_name = "";
        $contact_no = "";
        $district = "";

        $successMessage = "Customer Added Successfully";

        header("location: /PHP-ERP-system/index.php");
        exit;

    } while (false);
}

?>


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
        <h2 id="cus">Register Customer</h2>

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

            <label for="title">Title</label>
            <select id="title" name="title">
                <option>...Select...</option>
                <option value="mr">Mr</option>
                <option value="mrs">Mrs</option>
                <option value="miss">Miss</option>
                <option value="dr">Dr</option>
            </select>

           

            <label for="fname">First Name</label>
            <input type="text" id="fname" name="first_name" value="<?php echo $first_name; ?>">

            <label for="lname">Middle Name</label>
            <input type="text" id="mname" name="middle_name" value="<?php echo $middle_name; ?>">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="last_name" value="<?php echo $last_name; ?>">

            <label for="cno">Contact No</label>
            <input type="text" id="cno" name="contact_no" value="<?php echo $contact_no; ?>">


            <label for="district">District</label>
            <select id="district" name="district">
                <option>...Select...</option>
                <option value="1">Ampara</option>
      <option value="2">Anuradhapura</option>
      <option value="3">Badulla</option>
      <option value="4">Batticaloa</option>
      <option value="5">Colombo</option>
      <option value="6">Galle</option>
      <option value="7">Gampaha</option>
      <option value="8">Hambantota</option>
      <option value="9">Jaffna</option>
      <option value="10">Kalutara</option>
      <option value="11">Kandy</option>
      <option value="12">Kegalle</option>
      <option value="13">Kilinochchi</option>
      <option value="14">Kurunegala</option>
      <option value="15">Mannar</option>
      <option value="16">Matale</option>
      <option value="17">Matara</option>
      <option value="18">Moneragala</option>
      <option value="19">Mullaitivu</option>
      <option value="20">Nuwara Eliya</option>
      <option value="21">Polonnaruwa</option>
      <option value="22">Puttalam</option>
      <option value="23">Ratnapura</option>
      <option value="24">Trincomalee</option>
      <option value="25">Vavuniya</option>
            </select>

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
