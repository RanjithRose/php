
<?php 
include 'index.php';

if(isset($_GET['id'])){

     $id = base64_decode($_GET['id']);
     $sql ="DELETE FROM `form` WHERE id = $id";
     
    if($ranji->query($sql)){
        $msg = "delete";
    } else {
        $msg = "Error: " . $sql . "<br>" ;
    }
    header("Location: table.php?mse=$msg");
}

?>