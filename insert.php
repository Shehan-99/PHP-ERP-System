<?php

$servername = "localhost";
 $username = "root";
 $password = "";
 $database = "assignment";

 //create connection
 $connection = new mysqli($servername,$username,$password,$database);

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
    $sql = "INSERT INTO customer(title,first_name,middle_name,last_name,contact_no,district)" .
      "VALUES ('$title','$first_name','$middle_name','$last_name','$contact_no','$district')";
      $result = $connection->query($sql);

      if(!$result) {
        $errorMessage= "Invalid query:" . $connection->error;
        break;
      }
    
    $title= "";
    $first_name= "";
    $middle_name= "";
    $last_name= "";
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
<link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container my-5">
        <h2 id="cus"> Register Customer </h2>


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

    <form method="post" >

    <label id="l1" for="title">Title</label>
    <select id="title" name="title" value="<?php echo $title; ?>">
     <option >...Select...</option>
      <option value="mr">Mr</option>
      <option value="mrs">Mrs</option>
      <option value="miss">Miss</option>
      <option value="dr">Dr</option>
      
    </select>
    </br>
    <label id="l1" for="fname">First Name</label>
    <input type="text" id="fname" name="firstname"  value="<?php echo $first_name; ?>">
    </br>
    <label id="l1" for="lname">Middle Name</label>
    <input type="text" id="mname" name="middlename"  value="<?php echo $middle_name; ?>">
    </br>
    <label id="l1" for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname"  value="<?php echo $last_name; ?>">
    </br>  
    <label id="l1" for="cno">Contact No</label>
    <input type="text" id="cno" name="cno"  value="<?php echo $contact_no; ?>">
    </br>
    <label id="l1" for="title">District</label>
    <select id="district" name="district" value="<?php echo $district; ?>">
     <option >...Select...</option>
      <option >1</option>
      <option >2</option>
      <option >3</option>
      <option >4</option>
      <option >5</option>
      <option >6</option>
      <option >7</option>
      <option >8</option>
      <option >9</option>
      <option >10</option>
      <option >11</option>
      <option >12</option>
      <option >13</option>
      <option >14</option>
      <option >15</option>
      <option >16</option>
      <option >17</option>
      <option >18</option>
      <option >19</option>
      <option >20</option>
      <option >21</option>
      <option >22</option>
      <option >23</option>
      <option >24</option>
      <option >25</option>
      
    </select>
  
  </form>

        <!-- <div class="row mb-3">
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
</div> -->

    <!-- <div class="row mb-3">
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
</div> -->

<!-- <div class="row mb-3">
       <label class="col-sm-3 col-from-lable">District</label>
       <div class= "col-sm-6">
       <input type="text"  class="form-control" name="district" value="<?php echo $district; ?>">
    </div>
</div> -->

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
        <button type="submit" class="submit"><a href="/PHP-ERP-System/index.php" role="button">Submit</btton>
    </div>
    <div class="col-sm-3 col-sm-3 d-grid">
        <button class='canclebtn'><a href="/PHP-ERP-System/index.php" role="button">Cancle</a></button>
</div>
        </form>

    </div>
</body>
</html>