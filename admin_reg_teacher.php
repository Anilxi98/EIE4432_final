<html>
<head>
    <title>Add Teacher</title>
</head>
<body>
    <?php
        $server = "localhost";
        $user = "wbip";
        $pw = "wbip123";
        $db = "user";
        $connect = mysqli_connect($server, $user, $pw, $db);
        if(!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $Username = $_POST['Re_Username'];
	    $Password = $_POST['Re_Password'];
        $Nickname = $_POST['Re_Nickname'];
        $Email = $_POST['Re_Email'];
        $image = $_POST['Re_image'];
        $course = $_POST['course'];
	   
        
        $sql_insert = "INSERT INTO teacher (teacher.username_teacher, password, nickname, email, profileimage, course)
        VALUES ('$Username', '$Password','$Nickname', '$Email', '$image','$course');";
	    

        if ($connect->query($sql_insert) === TRUE) {
            echo "<h3>Add Successfully!</h3>";
        } else {
            echo "Error: ".$sql_insert."".$connect->error;
        }

        echo "<a href='admin_account.php'>Go back to admin main page</a>";


    ?>
</body>