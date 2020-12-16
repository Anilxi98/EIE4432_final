<?php
    $name = $_COOKIE["username"];
    setcookie("username",$name,time()-1);
    echo "<h2>Logout Successfully!</h2>";
    echo "<p><a href='login.html'>Click me go back to login page!</a></p>";
?>