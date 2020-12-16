<?php
    $server = "localhost";
    $user = "wbip";
    $pw = "wbip123";
    $db = "user";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name_all = array();
    $userQuery = "SELECT *
        FROM finishtime ";
    $result = mysqli_query($connect, $userQuery);
    while ($row_name = mysqli_fetch_assoc($result)){
        array_push($name_all,$row_name['name']);
    }
    $score_record_all =array();
    $score_each_question = array();

    for ($j =0; $j<count($name_all);$j++){
        $name = $name_all[$j];
        $your_score = 0;
        $question_number = 1;
        $score_record=array();

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
                    // If there is no record searched in both multiplechoice and Truefalse database, record the total score
                    array_push($score_record,$your_score);
                    array_push($score_record_all,$score_record);
                    $flag = false;
                    break;
                }
                else {
                    
                    while ($row = mysqli_fetch_assoc($result2)){
                        array_push($score_each_question,$row['value']);
                        $sql_search_your = "SELECT *
                        FROM  $name 
                        WHERE $name.Questionnumber = '{$question_number}'";
                        $result_your = mysqli_query($connect, $sql_search_your);
                        while ($row2 = mysqli_fetch_assoc($result_your)){
                            if ($row2['Answer'] == $row['Answer']){
                                array_push($score_record,$row['value']);
                                $your_score += $row['value'];
                            }
                            else {
                                array_push($score_record,0);
                            }
                        }

                    }
                    $question_number ++;
                }
            }
            else {
                while ($row = mysqli_fetch_assoc($result)){
                    array_push($score_each_question,$row['value']);
                    $sql_search_your = "SELECT *
                    FROM  $name 
                    WHERE $name.Questionnumber = '{$question_number}'";
                    $result_your = mysqli_query($connect, $sql_search_your);
                    while ($row2 = mysqli_fetch_assoc($result_your)){
                        if ($row2['Answer'] == $row['Correctoption']){
                            array_push($score_record,$row['value']);
                            $your_score += $row['value'];
                        }
                        else {
                            array_push($score_record,0);
                        }
                    }
                    
                }
                $question_number ++;
            }
        }
    }

    for ($i=1; $i<$question_number;$i++){
        $tr = 0;
        $fa = 0;
        for ($j=0; $j<count($name_all);$j++){
            if ($score_record_all[$j][$i-1] == 0){
                $fa++;
            }
            else {
                $tr++;
            }
        }
        $rate = $tr/($tr+$fa);
        echo "The Correct rate for Question ".$i." is ".$rate;
        echo "<br>";
        $tem_mark = $score_each_question[$i-1]*$rate;
        echo "The average score of question ".$i."is ".$tem_mark;
        echo "<br>";
    }


    $tem_all_mark = array();

    foreach ($score_record_all as $array) {
        $last_index = count($array);
        array_push($tem_all_mark,$array[$last_index-1]);
        
    }
    $max = max($tem_all_mark);
    $min = min($tem_all_mark);

    sort($tem_all_mark);
    $count = sizeof($tem_all_mark);   // cache the count
    $index = floor($count/2);  // cache the index
    if (!$count) {
        echo "no values";
    } elseif ($count & 1) {    // count is odd
        $median = $tem_all_mark[$index];
    } else {                   // count is even
        $median = ($tem_all_mark[$index-1] + $tem_all_mark[$index]) / 2;
    }

    $average = array_sum($tem_all_mark) / $count;
    echo "The highest mark is $max<br>";
    echo "The lowest mark is $min<br>";
    echo "The median mark is $median<br>";
    echo "The average mark is $average<br>";



?>
<html>
<head>
    <title> View Statistics
    </title>
    <script>
        
    </script>
</head>
<body>

</body>
</html>