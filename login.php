<?php
    require("config.php");
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: homepage.php");
    } else {
        if(isset($_POST["submit"])) {
            $email = $_POST['email'];
            if(preg_match($email_regex,$email)){
                $password = sha1($_POST['password']);
                $rec = mysqli_query($con, "select * from user where email='$email' and password='$password'");
                if(mysqli_num_rows($rec)){
                    $_SESSION['username'] = $email;
                    header("Location: homepage.php");
                } else if(isset($_POST["email"]) && !mysqli_num_rows($rec)){
                    $message = "No Such User Found";
                }
            } else {
                $message = "Please enter a correct email address";
            }
        }
    }
?>

<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
	<title>Login</title>
</head>
<body>
    <div class="container">
        <h1>
        <?php
            if(!isset($_SESSION["username"])){
                echo "Login";
            }
        ?>
        </h1>
        <div class="message">
            &nbsp;
            <?php
            echo $message;
            ?>
        </div>

        <form method="POST">
            <input type="text" name="email" action="<?php $_SERVER[PHP_SELF]?>" placeholder="Username" required><br>
            <input type="password" name="password" id="inputPassword" placeholder="Password" required><br>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>
</html>