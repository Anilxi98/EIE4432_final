<?php
        $server = "localhost";
        $user = "wbip";
        $pw = "wbip123";
        $db = "user";
        $connect = mysqli_connect($server, $user, $pw, $db);
        if(!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $q = json_decode($_GET['q']);
        $question_number = $q[0];
        $QuestionText = $q[1];
        $Answer = $q[2];
        $question_value = $q[3];

        $sql_insert = "INSERT INTO truefalse (truefalse.Questionnumber, Questiontext, Answer, value)
        VALUES ('$question_number', '$QuestionText','$Answer',$question_value );";
	    

        if ($connect->query($sql_insert) === TRUE) {
            
        } 


    ?>