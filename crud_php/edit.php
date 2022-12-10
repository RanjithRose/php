<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
</head>
<body>
    

<?php 
include 'index.php';

if(isset($_GET['id'])){

    $id =base64_decode($_GET['id']);
    $sql = "SELECT * FROM `form` WHERE id = $id";
    $result = $ranji->query($sql);
    $row = $result->fetch_assoc();

?>

<form action="" method="post">
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">
    <input type="text" name="fname" value="<?php echo $row['Name']; ?>" placeholder="name"><br><br>
    <input type="text" name="email" value="<?php echo $row['Email']; ?>" placeholder="email"><br><br>
    <input type="text" name="phone_no" value="<?php echo $row['Phone_no']; ?>" placeholder="phone"><br><br>
    <input type="text" name="birth" value="<?php echo $row['DOB']; ?>" placeholder="phone"><br><br>
    <input type="submit" name="update" value="Submit">
</form>


<?php } ?>


   <!--  ..................................     update   .................................................  -->


<?php

    include 'index.php';
    
    if(isset($_POST['update'])){
        extract($_POST);

        $id = base64_decode($id);

        $sql = "UPDATE `form` SET `Name`='$fname',`Email`='$email',`Phone_no`='$phone_no',`DOB`='$birth' WHERE id = $id";

        if($ranji->query($sql)){
            $msg = "update";
        } else {
            $msg = "Error: " . "<br>" . $ranji->error;
        }
        
        header("Location:table.php?mse=$msg");

    }

    ?>




</body>
</html>


