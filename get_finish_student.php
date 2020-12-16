<?php
    $server = "localhost";
    $user = "wbip";
    $pw = "wbip123";
    $db = "user";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql_search = "SELECT *
    FROM  finishtime ";
    $result = mysqli_query($connect, $sql_search);
    if(!$result) {
        die("Could not successfully run query." . mysqli_error($connect) );
    }

    if (mysqli_num_rows($result) == 0){
        echo "There is no student finished the exam now!";
    }
    else {
        echo "<select id = 'student_finish' name = 'student_finish'>";
        echo "<option value = ''></option>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<option value = ".$row['name'].">".$row['name']."</option>";
        }
    }
    echo "</select>";


?>