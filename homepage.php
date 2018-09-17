<html>
    <head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/homepage.css">
    <style>
        
    </style>
    </head>
    <body>
        <div class="container">
        <h1>
        <?php
            session_start();
            if(isset($_SESSION['username'])){
                echo "Welcome ".$_SESSION["username"]."<br>";
            } else {
                echo "Not logged in <br>";
            }
        ?>
        </h1>
        <?php
            session_start();
            if(isset($_SESSION['username'])){
                echo '<button onclick="location.href= \'logout.php\'">Logout</button>';
            }
        ?>
        </div>
    </body>
</html>