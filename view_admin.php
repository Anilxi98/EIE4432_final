<?php
    $server = "localhost";
    $user = "wbip";
    $pw = "wbip123";
    $db = "user";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery_student = "SELECT *
        FROM student ";
    $result_student = mysqli_query($connect, $userQuery_student);
    echo "<h2>Student information:</h2>";
    echo "<table border = '2'>";
            echo "<tr><th>username</th>
            <th>password</th>
            <th>nickname</th>
            <th>email</th>
            <th>profile image number</th>
            <th>gender</th>
            <th>birthday</th></tr>";
    while ($row = mysqli_fetch_assoc($result_student)){
        echo "<tr><td>".$row['username']."</td>
        <td>".$row['password']."</td>
        <td>".$row['nickname']."</td>
        <td>".$row['email']."</td>
        <td>".$row['profileimage']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['birthday']."</td></tr>";        
    }
    echo "</table>";

    $userQuery_teacher = "SELECT *
        FROM teacher ";
    $result_teacher = mysqli_query($connect, $userQuery_teacher);
    echo "<h2>Teacher information:</h2>";
    echo "<table border = '2'>";
            echo "<tr><th>username</th>
            <th>password</th>
            <th>nickname</th>
            <th>email</th>
            <th>profile image number</th>
            <th>course</th></tr>";

    while ($row = mysqli_fetch_assoc($result_teacher)){
        echo "<tr><td>".$row['username_teacher']."</td>
        <td>".$row['password']."</td>
        <td>".$row['nickname']."</td>
        <td>".$row['email']."</td>
        <td>".$row['profileimage']."</td>
        <td>".$row['course']."</td></tr>";        
    }
    echo "</table>";

    $userQuery_admin = "SELECT *
        FROM admin ";
    $result_admin = mysqli_query($connect, $userQuery_admin);
    echo "<h2>Admin information:</h2>";
    echo "<table border = '2'>";
            echo "<tr><th>username</th>
            <th>password</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result_admin)){
        echo "<tr><td>".$row['username']."</td>
        <td>".$row['password']."</td></tr>";        
    }
    echo "</table>";

    echo "<a href='admin_account.php'>Go back to admin main page</a>";






?>