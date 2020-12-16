<?php
        $server = "localhost";
        $user = "wbip";
        $pw = "wbip123";
        $db = "user";
        $connect = mysqli_connect($server, $user, $pw, $db);
        if(!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $question_number = $_GET['q'];
        $name = $_COOKIE['username'];
        date_default_timezone_set("Asia/Hong_Kong");

        $sql_search = "SELECT *
        FROM  multiplechoice 
        WHERE multiplechoice.Questionnumber = '{$question_number}'";
	    
        $result = mysqli_query($connect, $sql_search);
        if(!$result) {
            die("Could not successfully run query." . mysqli_error($connect) );
        }
        if (mysqli_num_rows($result) == 0) {
            $finish = date("Y/m/d")."/".date("h:i:sa");
            $sql_search2 = "SELECT *
            FROM  truefalse 
            WHERE truefalse.Questionnumber = '{$question_number}'";
            $result2 = mysqli_query($connect, $sql_search2);

            if (mysqli_num_rows($result2) == 0){
                echo "<h3>You have finished all the questions!</h3>";
                $sql_insert = "INSERT INTO finishtime (finishtime.name, finishtime)
                VALUES ('$name', '$finish');";
                if ($connect->query($sql_insert) === TRUE) {

                }
                echo "<a href='student_account.html'>Click me to go back!</a>";
            }
            else {
                while ($row = mysqli_fetch_assoc($result2)){
                    echo $row['Questiontext'];
                    echo "<fieldset id='TF'>
                    <input type='radio' id='T' name='TF' value='T'>True<br>
                    <input type='radio' id='F' name='TF' value='F'>False<br>
                    </fieldset>";
                    echo "<input type = 'button' value = 'Submit and move to next question' onclick='submit_next_question();'>";
                }
            }
        }
        else {
            while ($row = mysqli_fetch_assoc($result)){
                echo $row['Question'];
                echo "<fieldset id='mulchoice'>
                <input type='radio' id='A' name='mulchoice' value='A'>".$row['OptionA']."<br>
                <input type='radio' id='B' name='mulchoice' value='B'>".$row['OptionB']."<br>
                <input type='radio' id='C' name='mulchoice' value='C'>".$row['OptionC']."<br>
                <input type='radio' id='D' name='mulchoice' value='D'>".$row['OptionD']."<br>
                </fieldset>";
                echo "<input type = 'button' value = 'Submit and move to next question' onclick='submit_next_question();'>";
            }
        }



    ?>