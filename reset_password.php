<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <?php
        $server = "localhost";
        $user = "wbip";
        $pw = "wbip123"; 
        $db = "user";
        $connect = mysqli_connect($server, $user, $pw, $db);
        $username = $_POST['Reset_Username'];
        $password = $_POST['Reset_Password'];

        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        
        $sql_reset = "UPDATE student SET password='{$password}' WHERE username = '{$username}'";
        $sql_reset2 = "UPDATE teacher SET password='{$password}' WHERE username_teacher = '{$username}'";
        $mysqli = new mysqli($server, $user, $pw, $db);
        
        $mysqli -> query($sql_reset);
        $rc = $mysqli -> affected_rows;
        $mysqli -> query($sql_reset2);
        $rc2 = $mysqli -> affected_rows;

        if ($rc == 0 && $rc2 == 0){
            echo "<h3>Cannot find any users in database or the password you entered is the original password!</h3>";
        }
        else{
            echo "<h3>Reset Successfully!</h3>";
        }
        echo "<a href='login.html'>Go back to login page</a>";
        
           

    

              



          

        
    ?>
</body>


</html>