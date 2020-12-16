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
    $course = $_POST['course'];

    $modify_teacher = "UPDATE teacher 
    SET password ='{$Password}'
    WHERE username_teacher = '{$Username}'";

    $modify_teacher2 = "UPDATE teacher 
    SET nickname ='{$Nickname}'
    WHERE username_teacher = '{$Username}'";

    $modify_teacher3 = "UPDATE teacher 
        SET email ='{$Email}'
        WHERE username_teacher = '{$Username}'";

    $modify_teacher4 = "UPDATE teacher 
        SET profileimage ='{$image}'
        WHERE username_teacher = '{$Username}'";

    $modify_teacher5 = "UPDATE teacher 
        SET course = '{$course}'
        WHERE username_teacher = '{$Username}'";

    $mysqli = new mysqli($server, $user, $pw, $db);

    $mysqli -> query($modify_teacher);
    $mysqli -> query($modify_teacher2);
    $mysqli -> query($modify_teacher3);
    $mysqli -> query($modify_teacher4);
    $mysqli -> query($modify_teacher5);

    echo "<h3>Modify Successfully!</h3>";
    echo "<a href='admin_account.php'>Click me to go back to admin main page!</a>";



?>