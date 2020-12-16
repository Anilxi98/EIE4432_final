<?php
    $server = "localhost";
    $user = "wbip";
    $pw = "wbip123";
    $db = "user";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $name = $_COOKIE['username'];
    
    $your_score = 0;
    $question_number = 1;

    $flag = true;
    while ($flag) {
        $sql_search = "SELECT *
        FROM  multiplechoice 
        WHERE multiplechoice.Questionnumber = '{$question_number}'";
	    
        $result = mysqli_query($connect, $sql_search);
        if(!$result) {
            die("Could not successfully run query." . mysqli_error($connect) );
        }
        if (mysqli_num_rows($result) == 0) {
            $sql_search2 = "SELECT *
            FROM  truefalse 
            WHERE truefalse.Questionnumber = '{$question_number}'";
            $result2 = mysqli_query($connect, $sql_search2);

            if (mysqli_num_rows($result2) == 0){
                echo "<br><h3>Total score is $your_score"."</h3>";
                $sql_search3 = "SELECT *
                FROM  finishtime 
                WHERE finishtime.name = '{$name}'";
                $result3 = mysqli_query($connect, $sql_search3);

                while ($row3 = mysqli_fetch_assoc($result3)){
                    echo "<h3>Finish time is ".$row3['finishtime']."</h3>";
                }
                $flag = false;
                break;
            }
            else {
                
                while ($row = mysqli_fetch_assoc($result2)){
                    echo "<br>Question $question_number:<br>";
                    echo $row['Questiontext']."<br>";
                    echo "Correct Option: ".$row['Answer']."<br>";
                    echo "Score is ".$row['value']."<br>";

                    $sql_search_your = "SELECT *
                    FROM  $name 
                    WHERE $name.Questionnumber = '{$question_number}'";
                    $result_your = mysqli_query($connect, $sql_search_your);
                    while ($row2 = mysqli_fetch_assoc($result_your)){
                        echo "Your answer is ".$row2['Answer']."<br>";
                        if ($row2['Answer'] == $row['Answer']){
                            echo "You are right!<br>";
                            $your_score += $row['value'];
                        }
                        else {
                            echo "You are wrong!<br>";
                        }
                    }

                }
                $question_number ++;
            }
        }
        else {
            
            while ($row = mysqli_fetch_assoc($result)){
                echo "<br>Question $question_number:<br>";
                echo $row['Question']."<br>";
                echo "Option A:".$row['OptionA']."<br>";
                echo "Option B:".$row['OptionB']."<br>";
                echo "Option C:".$row['OptionC']."<br>";
                echo "Option D:".$row['OptionD']."<br>";
                echo "Correct Option:".$row['Correctoption']."<br>";
                echo "Score is ".$row['value']."<br>";

                $sql_search_your = "SELECT *
                FROM  $name 
                WHERE $name.Questionnumber = '{$question_number}'";
                $result_your = mysqli_query($connect, $sql_search_your);
                while ($row2 = mysqli_fetch_assoc($result_your)){
                    echo "Your answer is ".$row2['Answer']."<br>";
                    if ($row2['Answer'] == $row['Correctoption']){
                        echo "You are right!<br>";
                        $your_score += $row['value'];
                    }
                    else {
                        echo "You are wrong!<br>";
                    }
                }
                
            }
            $question_number ++;
        }
    }
    
    
?>

<html>
<head>
    <title> View result
    </title>
</head>
<body>
    
</body>
</html>
