<?php
    echo "<h1>Welcome, admin ".$_COOKIE["username"]."</h1>";
?>
<html>
<head>
    <title> Admin account
    </title>
    <script>
        function submit_view(){
            document.view.action="view_admin.php";
            document.view.submit();
        }

        function submit_add(){
            document.view.action="admin_add.php";
            document.view.submit();
        }
        function submit_remove(){
            document.view.action="admin_remove.php";
            document.view.submit();
        }
        function submit_modify(){
            document.view.action="admin_modify.php";
            document.view.submit();
        }
    </script>
</head>
<body>
    <table>
        <form action = "" method = "post" name = "view">
        <tr>
            <td>
                <input type = "button" value = "Click me to View all users' information" onclick="submit_view();">
            </td>
            
        </tr>
        </form>
        <tr>
            <td>
                <input type = "button" value = "Click me to Add account" onclick="submit_add();">
            </td>  
        </tr>
        <tr>
            <td>
                <input type = "button" value = "Click me to Remove account" onclick="submit_remove();">
            </td>
            
        </tr>
        <tr>
            <td>
                <input type = "button" value = "Click me to modify account" onclick="submit_modify();">
            </td>
            
        </tr>
    </table>
    
</body>
</html>