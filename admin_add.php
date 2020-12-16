<html>
<head>
    <title> Admin add
    </title>
    <script>
        function handleChange_Stu(){
            var myRequest = new XMLHttpRequest();
		    myRequest.open("GET", "change_stu.php?q=", true);
		    myRequest.send();
		    myRequest.onload = function(){
			    document.getElementById("txtHint").innerHTML = this.responseText;
		    }
        }

        function handleChange_Tea(){
            var myRequest = new XMLHttpRequest();
		    myRequest.open("GET", "change_tea.php?q=", true);
		    myRequest.send();
		    myRequest.onload = function(){
			    document.getElementById("txtHint").innerHTML = this.responseText;
		    }
        }

        function submit_register(){
            var ele = document.getElementsByName('group1'); 
            for(i = 0; i < ele.length; i++) { 
                if(ele[i].checked){
                    var name = "admin_reg_"+ele[i].value+".php";
                    document.regi.action=name;
                    document.regi.submit();
                }
            } 
        }
    </script>
    <link rel ="stylesheet" type="text/css" href="register.css"/>
</head>
<body>
    <h1 style="color:black"> Admin add account System </h1>
    <form action = "" method = "post" name = "regi">
    <table>
        <tr>
            <p>Please choose the role of new account:</p>
            <fieldset id="group1">
            <input type="radio" id="student" name="group1" value="student" onchange="handleChange_Stu();">
            <label for="student">Student</label><br>
            <input type="radio" id="teacher" name="group1" value="teacher" onchange="handleChange_Tea();">
            <label for="teacher">Teacher</label><br>
            </fieldset>
        </tr>
        <tr>
            <td><label>Username:</label></td>
            <td><input type = "text"  id = "Re_Username" name = "Re_Username"></td>
        </tr>
        <tr>
            <td><label>Password:</label></td>
            <td><input type = "text"  id = "Re_Password" name = "Re_Password"></td>
        </tr>
        <tr>
            <td><label>nick name:</label></td>
            <td><input type = "text"  id = "Re_Nickname" name = "Re_Nickname"></td>
        </tr>
        <tr>
            <td><label>email:</label></td>
            <td><input type = "text"  id = "Re_Email" name = "Re_Email"></td>
        </tr>
        
    </table>
    <table>
        <tr>
            <div id="txtHint"></div>
        </tr>
        <tr>
            <td><label>choose one profile image, input in integer number:</label></td>
            <td><input type = "text"  id = "Re_image" name = "Re_image"></td>
        </tr>
    </table>
        
    <input type = "button" value = "Register" onclick="submit_register();">
    </form>
    <p><a href='admin_account.php'>Click me to go back to admin page!</a></p>
    
    
</body>

</html>