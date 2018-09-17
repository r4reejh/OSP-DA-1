<?php
require("config.php");

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);

    if(!preg_match($name_regex, $name)){
        $message = "PLease enter a valid name";
    } else if(!preg_match($email_regex, $email)){
        $messge = "The email address you entered is invalid";
    } else {
        if($email && $password){
            $check = "select * from user where email='$email'";
            $rec1 = mysqli_query($con, $check);
    
            if(mysqli_num_rows($rec1)){
                $message = "User with email already exists<br>";
            } else {
                $sql = "insert into `user` (`name`, `email`, `password`) values ('$name','$email', '$password')";
                $rec = mysqli_query($con, $sql);
    
                if($rec){
                    $message = "successfully registered, you may login now<br>";
                } else {
                    $message =  "something went wrong<br>";
                }
            }
        }
    }
}
?>

<html>
<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
    <h1>
        Signup
    </h1>
    <div class="message">
        &nbsp;
        <?php
        if($message){
            echo $message;
        }
        ?>
    </div>
	<form method="POST" action="<?php $_SERVER[PHP_SELF]?>">
        <input type="text" name="name" placeholder="Name" required><br>
		<input type="text" name="email" placeholder="Username" required><br>
		<input type="password" name="password" id="inputPassword" placeholder="Password" required><br>
        <label> Gender</label>
        <input type="radio" name="gender" value="male">Male</input>
        <input type="radio" name="gender" value="female">Female</input>
        <input type="radio" name="gender" value="other">Other</input><br>
        <br>
        <label>Stream</label>
        <select name="stream">
            <option value="BIT">BIT</option>
            <option value="BCE">BCE</option>
            <option value="BEE">BEE</option>
            <option value="BME">BME</option>
        </select>

        <br>    
		<button type="submit" name="submit">Register</button>
        <button onclick="location.href= 'login.php'">Login</button>
    </form>
</div>
</body>
</html>