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
        $question = $q[0];
        $optionA = $q[1];
        $optionB = $q[2];
        $optionC = $q[3];
        $optionD = $q[4];
        $correctoption = $q[5];
        $question_number = $q[6];
        $question_value = $q[7];

        $sql_insert = "INSERT INTO multiplechoice (multiplechoice.Questionnumber, Question, OptionA	, OptionB, OptionC, OptionD, Correctoption, value)
        VALUES ('$question_number', '$question','$optionA', '$optionB', '$optionC','$optionD','$correctoption','$question_value');";
	    

        if ($connect->query($sql_insert) === TRUE) {
            
        } 


    ?>
