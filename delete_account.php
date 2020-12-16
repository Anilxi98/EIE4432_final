<?php
    $server = "localhost";
    $user = "wbip";
    $pw = "wbip123"; 
    $db = "user";
    $connect = mysqli_connect($server, $user, $pw, $db);

    $account_name = $_GET['q'];

    $sql_delete = "DELETE FROM student
        WHERE username = '{$account_name}';";

    if ($connect->query($sql_delete) === TRUE){

    }

    $sql_delete2 = "DELETE FROM teacher
        WHERE username_teacher = '{$account_name}';";

    if ($connect->query($sql_delete2) === TRUE){
        
    }



?>