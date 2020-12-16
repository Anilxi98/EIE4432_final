<?php
    echo "<select id = 'account_name' name = 'account_name'>";
    echo "<option value = ''></option>";

    $server = "localhost";
    $user = "wbip";
    $pw = "wbip123"; 
    $db = "user";
    $connect = mysqli_connect($server, $user, $pw, $db);

    $userQuery_stu= "SELECT *
    FROM student ";
    $result_stu = mysqli_query($connect, $userQuery_stu);

    if(!$result_stu) {
        die("Could not successfully run query." . mysqli_error($connect) );
    }
    if (mysqli_num_rows($result_stu) != 0) {
        while ($row = mysqli_fetch_assoc($result_stu)){
            echo "<option value = ".$row['username'].">".$row['username']."</option>";
        }
    }

    $userQuery_tea= "SELECT *
    FROM teacher ";
    $result_tea = mysqli_query($connect, $userQuery_tea);

    if(!$result_tea) {
        die("Could not successfully run query." . mysqli_error($connect) );
    }
    if (mysqli_num_rows($result_tea) != 0) {
        while ($row = mysqli_fetch_assoc($result_tea)){
            echo "<option value = ".$row['username_teacher'].">".$row['username_teacher']."</option>";
        }
    }
    echo "</select>";

?>