<html>
<head>
    <title>Add Student</title>
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
        $gender = $_POST['gender'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $image = $_POST['Re_image'];
	    $birthday = $year.'-'.$month.'-'.$day;
        
        $sql_insert = "INSERT INTO student (student.username, password, nickname, email, profileimage, gender, birthday)
        VALUES ('$Username', '$Password','$Nickname', '$Email', '$image','$gender','$birthday');";
	    

        if ($connect->query($sql_insert) === TRUE) {
            echo "<h3>Add Successfully!</h3>";
        } else {
            echo "Error: ".$sql_insert."".$connect->error;
        }

        echo "<a href='admin_account.php'>Go back to admin main page</a>";


    ?>
</body>