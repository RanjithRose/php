<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
</head>

<body>
    <form action="" method="post">
        <label>Enter Your Name :</label>
        <input type="text" name="fname"><br><br>
        <label>Enter Your Email :</label>
        <input type="email" name="email"><br><br>
        <label>Enter Your Phone_No :</label>
        <input type="number" name="phone_no"><br><br>
        <label>Enter Your Date Of Birth :</label>
        <input type="text" name="birth"><br><br>
        <input type="submit" value="submit" name="submit">
    </form>


    <?php


    include 'index.php';

    if (isset($_POST['submit'])) {
        extract($_POST);
        // print_r($_POST);
        if ($fname == '' && $email == '' && $phone_no == '' && $birth == '') {
            echo "please fill the all box";
        } else {
            $sql = "INSERT INTO `form`(`Name`, `Email`, `Phone_no`, `DOB`) VALUES ('$fname','$email','$phone_no','$birth')";
            // print_r($result);
            if ($ranji->query($sql)) {
                echo "success";
            } else {
                echo "error";
            }
        }
    }

    ?>

</body>

</html>