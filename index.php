<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" .
         mysqli_connect_error());
    }
    // echo "success connecting to the db"
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wlecome to traval form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bgp.jpg" alt="it company">
    <div class="container">
        <h1>wlecome to collage trip</h1>
        <p>enter your details and submit this form to confirm  your participation in the trip</p>


        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="phone" placeholder="enter your phone no">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter any details here"></textarea>
            <button class="btn">submit</button>
            <button class="btn">reset</button>

        </form>
        <?php
        if($insert == true){
        echo "<footer>thanks for submitting your form. we are happy to see  you joining with us in trip</footer>";
        }
        ?>
    </div>

    <script src="index.js"></script>
</body>
</html>
