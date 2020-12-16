<?php
    $server = "localhost";
    $user = "wbip";
    $pw = "wbip123";
    $db = "user";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $Username = $_COOKIE["tem_name"] ;
    setcookie("tem_name", $Username, time() -1);
    $Password = $_POST['Password'];
    $Nickname = $_POST['Nickname'];
    $Email = $_POST['Email'];
    $image = $_POST['image'];
    $gender = $_POST['gender'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
	$birthday = $year.'-'.$month.'-'.$day;
    
    $modify_student = "UPDATE student 
    SET password ='{$Password}'
    WHERE username = '{$Username}'";

    $modify_student2 = "UPDATE student 
    SET nickname ='{$Nickname}'
    WHERE username = '{$Username}'";

    $modify_student3 = "UPDATE student 
        SET email ='{$Email}'
        WHERE username = '{$Username}'";

    $modify_student4 = "UPDATE student 
    SET profileimage ='{$image}'
    WHERE username = '{$Username}'";

    $modify_student5 = "UPDATE student 
        SET gender = '{$gender}'
        WHERE username = '{$Username}'";

    $modify_student6 = "UPDATE student 
    SET birthday = '{$birthday}'
    WHERE username = '{$Username}'";

    $mysqli = new mysqli($server, $user, $pw, $db);

    $mysqli -> query($modify_student);
    $mysqli -> query($modify_student2);
    $mysqli -> query($modify_student3);
    $mysqli -> query($modify_student4);
    $mysqli -> query($modify_student5);
    $mysqli -> query($modify_student6);


    echo "<h3>Modify Successfully!</h3>";
    echo "<a href='admin_account.php'>Click me to go back to admin main page!</a>";


?>