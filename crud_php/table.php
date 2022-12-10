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
    
    if(isset($_GET['mse'])){
        echo $_GET['mse'];
    }

    ?>

    <form action="" method="get">
        <input type="text" name="search">
        <input type="submit" value="Search">
    </form>
 
    <table border=1>
        <tr>
            <td>Sno</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>dob</td>
            <td>Action</td>
            
        </tr>
        <br><br>

        <?php
  

            include 'index.php';

            if(isset($_GET['search'])){
                $keyword = $_GET['search'];
                $search = " WHERE Name LIKE '%$keyword%' OR Email LIKE '%$keyword%'";
            }else{
                $search = '';
            }

            $sql = "SELECT * FROM `form`".$search;
            $result = $ranji->query($sql);

            // print_r($result);

            $total = $result->num_rows;

            

            if($total > 0){

                while($row = $result->fetch_assoc()){
                    
                    $en_id = base64_encode($row['id']);

                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['Name']."</td>";
                    echo "<td>".$row['Email']."</td>";
                    echo "<td>".$row['Phone_no']."</td>";
                    echo "<td>".$row['DOB']."</td>";
                    echo "<td><a href='edit.php?id=".$en_id."'>Edit</a> | <a href='delete.php?id=".$en_id."'>Delete</a></td>";
                    echo "</tr>";
                }

            } else{
                echo "No records found";
            }
        
        ?>

    </table>

</body>
</html>