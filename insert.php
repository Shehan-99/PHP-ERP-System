<?php
$title ="";
$first_name ="";
$middle_name ="";
$last_name ="";
$contact_no ="";
$district ="";


$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $title= $_POST["title"];
    $first_name= $_POST["first_name"];
    $middle_name= $_POST["middle_name"];
    $last_name= $_POST["last_name"];
    $contact_no = $_POST["contact_no"];
    $district = $_POST["district"];


  do {
    if( empty($title) || empty($first_name) || empty($middle_name) || empty($last_name) || empty($contact_no) || empty($district)) {
        $errorMessage = "All the fields are required";
        break;
    }


    //add new customer
    
    $title= "";
    $first_name= "";
    $middle_name= "";
    $last_name= "";
    $contact_no = "";
    $district = "";

    $successMessage = "Customer Added Successfully";


  } while (false);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container my-5">
        <h2> New Customer </h2>


        <?php 
        if(!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">

        <div class="row mb-3">
       <label class="col-sm-3 col-from-lable">Title</label>
       <div class= "col-sm-6">
       <input type="text"  class="form-control" name="title" value="<?php echo $title; ?>">
    </div>
</div>

    <div class="row mb-3">
       <label class="col-sm-3 col-from-lable">First_Name</label>
       <div class= "col-sm-6">
       <input type="text"  class="form-control" name="first_name" value="<?php echo $first_name; ?>">
    </div>
</div>

    <div class="row mb-3">
       <label class="col-sm-3 col-from-lable">Middle_Name</label>
       <div class= "col-sm-6">
       <input type="text"  class="form-control" name="middle_name" value="<?php echo $middle_name; ?>">
    </div>
</div>

    <div class="row mb-3">
       <label class="col-sm-3 col-from-lable">Last_Name</label>
       <div class= "col-sm-6">
       <input type="text"  class="form-control" name="last_name" value="<?php echo $last_name; ?>">
    </div>
</div>

<div class="row mb-3">
       <label class="col-sm-3 col-from-lable">Contact_No</label>
       <div class= "col-sm-6">
       <input type="text"  class="form-control" name="contact_no" value="<?php echo $contact_no; ?>">
    </div>
</div>

<div class="row mb-3">
       <label class="col-sm-3 col-from-lable">District</label>
       <div class= "col-sm-6">
       <input type="text"  class="form-control" name="district" value="<?php echo $district; ?>">
    </div>
</div>

<?php 
if ( !empty($successMessage)) {
  echo "
  <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>";

}
?>


<div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Submit</btton>
    </div>
    <div class="col-sm-3 col-sm-3 d-grid">
        <a class="btn btn-primary" href="/csquare/index.php" role="button">Cancle</a>
</div>
        </form>

    </div>
</body>
</html>