    <?php
        $server = "localhost";
        $user = "wbip";
        $pw = "wbip123"; 
        $db = "user";
        $connect = mysqli_connect($server, $user, $pw, $db);
        $login_flag = true;
        $q = json_decode($_GET['q']);
        $username = $q[0];
        $password = $q[1];
        
        $userQuery= "SELECT *
        FROM student";
        $result = mysqli_query($connect, $userQuery);

        if(!$result) {
            die("Could not successfully run query." . mysqli_error($connect) );
        }
        if (mysqli_num_rows($result) == 0) {

        }
        else{
            while ($row = mysqli_fetch_assoc($result)){
                if ($row['username'] == $username){
                    if ($row['password'] == $password){
                        echo "Login successfully!Student";
                        setcookie("username", $username, time() + (3600));
                        $login_flag = false;
                        break;
                    }
                }
            }
        }

        if ($login_flag){
            $userQuery2= "SELECT *
            FROM teacher";
            $result = mysqli_query($connect, $userQuery2);
    
            if(!$result) {
                die("Could not successfully run query." . mysqli_error($connect) );
            }
            if (mysqli_num_rows($result) == 0) {

            }
            else{
                while ($row = mysqli_fetch_assoc($result)){
                    if ($row['username_teacher'] == $username){
                        if ($row['password'] == $password){
                            echo "Login successfully!Teacher";
                            setcookie("username", $username, time() + 3600);
                            $login_flag = false;
                            break;
                        }
                    }
                }
            }
        }

        if ($login_flag){
            $userQuery3= "SELECT *
            FROM admin";
            $result = mysqli_query($connect, $userQuery3);
            if(!$result) {
                die("Could not successfully run query." . mysqli_error($connect) );
            }
            if (mysqli_num_rows($result) == 0) {

            }
            else{
                while ($row = mysqli_fetch_assoc($result)){
                    if ($row['username'] == $username){
                        if ($row['password'] == $password){
                            echo "Login successfully!Admin";
                            setcookie("username", $username, time() + 3600);
                            $login_flag = false;
                            break;
                        }
                    }
                }
            }
        }
        
        if ($login_flag){
            echo 'Wrong password or username!';
        }
    ?>