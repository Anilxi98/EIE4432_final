<?php
        $server = "localhost";
        $user = "wbip";
        $pw = "wbip123";
        $db = "user";
        $connect = mysqli_connect($server, $user, $pw, $db);
        if(!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $name = $_COOKIE["username"];
        if(!isset($_COOKIE[$name])){
            setcookie($name, "done", time() + 3600);
            $sql = "CREATE TABLE $name(
                Questionnumber INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                Answer VARCHAR(10) NOT NULL
            )";
    
            if ($connect->query($sql) === TRUE) {
            } else {
                echo "Error creating table: " . $connect->error;
            }
        }

        $q = json_decode($_GET['q']);
        $student_answer = $q[0];
        $question_number = $q[1];

	    
        $sql_insert = "INSERT INTO $name ($name.Questionnumber, Answer)
        VALUES ('$question_number','$student_answer');";

        if ($connect->query($sql_insert) === TRUE) {
            
        } 



    ?>