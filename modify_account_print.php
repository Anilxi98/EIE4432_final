<?php
    $server = "localhost";
    $user = "wbip";
    $pw = "wbip123"; 
    $db = "user";
    $connect = mysqli_connect($server, $user, $pw, $db);

    $account_name = $_GET['q'];
    setcookie("tem_name", $account_name, time() + 3600);

    $search_student = "SELECT *
    FROM  student
    WHERE username = '{$account_name}'";
            
    $result_student = mysqli_query($connect, $search_student);
    if(!$result_student) {
        die("Could not successfully run query." . mysqli_error($connect) );
    }
    if (mysqli_num_rows($result_student) == 0){
        $search_teacher = "SELECT *
        FROM  teacher
        WHERE username_teacher = '{$account_name}'";
        $result_teacher = mysqli_query($connect, $search_teacher);
        
        while ($row = mysqli_fetch_assoc($result_teacher)){
            echo "<table>
            <tr>
                <td><label>Password:</label></td>
                <td><input type = 'text'  id = 'Password' name = 'Password'></td>
            </tr>
            <tr>
                <td><label>nick name:</label></td>
                <td><input type = 'text'  id = 'Nickname' name = 'Nickname'></td>
            </tr>
            <tr>
                <td><label>email:</label></td>
                <td><input type = 'text'  id = 'Email' name = 'Email'></td>
            </tr>
            <tr>
                <td><label>image:</label></td>
                <td><input type = 'text'  id = 'image' name = 'image'></td>
            </tr>
            <tr>
                <td><label>course:</label></td>
                <td><input type = 'text'  id = 'course' name = 'course'></td>
            </tr>
            <tr>
                <td><input type = 'button' value = 'Submit' onclick='modify_tea();'></td>
            </tr>
            
        </table>";
        }
    }
    else {
        echo "<table>
            <tr>
                <td><label>Password:</label></td>
                <td><input type = 'text'  id = 'Password' name = 'Password'></td>
            </tr>
            <tr>
                <td><label>nick name:</label></td>
                <td><input type = 'text'  id = 'Nickname' name = 'Nickname'></td>
            </tr>
            <tr>
                <td><label>email:</label></td>
                <td><input type = 'text'  id = 'Email' name = 'Email'></td>
            </tr>
            <tr>
                <td><label>image:</label></td>
                <td><input type = 'text'  id = 'image' name = 'image'></td>
            </tr>
        
            <tr>
                <td><label>gender:</label></td>
                <td><select id = 'gender' name = 'gender'>
                <option value = ''></option>
                <option value = 'Male'>Male</option>
                <option value = 'Female'>Female</option>
                <option value = 'Others'>Others</option>
                </select></td>
            </tr>
            <tr>
                <td><label>birthday:</label></td><br>
                <td><input type = 'text'  id = 'year' name = 'year'>year
                <input type = 'text'  id = 'month' name = 'month'>month
                <input type = 'text'  id = 'day' name = 'day'>day
                </td>
            </tr>
            <tr>
                <td><input type = 'button' value = 'Submit' onclick='modify_stu();'></td>
            </tr>
            
        </table>";
    }


    



?>