<html>
<head>
    <title> Admin modify account
    </title>
    <script>
        function read_account(){
            var myRequest = new XMLHttpRequest();
			myRequest.open("GET", "read_account.php?q=",true);
			myRequest.send();
			myRequest.onload = function(){
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
        }

        function submit_modify(){
            var sel = document.getElementById("account_name");
            var account_modify = sel.options[sel.selectedIndex].text;
            var myRequest = new XMLHttpRequest();
			myRequest.open("GET", "modify_account_print.php?q="+account_modify,true);
			myRequest.send();
			myRequest.onload = function(){
                document.getElementById("txtHint2").innerHTML = this.responseText;
			}
        }

        function modify_tea(){
            document.modify.action="modify_account_tea.php";
            document.modify.submit();
        }

        function modify_stu(){
            document.modify.action="modify_account_stu.php";
            document.modify.submit();
        }

    </script>
</head>
<body onload="read_account();">
    <h3>Please choose one account to modify:</h3>
    <span id="txtHint"></span>
    <br>
    <input type = "button" value = "Modify" onclick="submit_modify();">
    <br>
    <form action = "" method = "post" name = "modify">
    <span id="txtHint2"></span>
    </form>
    <a href='admin_account.php'>Click me to go back to admin account!</a>
    
</body>
</html>