<html>
<head>
    <title> Admin remove account
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

        function submit_remove(){
            var sel = document.getElementById("account_name");
            var account_delete = sel.options[sel.selectedIndex].text;
            var myRequest = new XMLHttpRequest();
			myRequest.open("GET", "delete_account.php?q="+account_delete,true);
			myRequest.send();
			myRequest.onload = function(){
                alert("Delete successfully!");
                read_account();
			}
        }

    </script>
</head>
<body onload="read_account();">
    <h3>Please choose one account to delete:</h3>
    <span id="txtHint"></span>
    <br>
    <input type = "button" value = "Remove" onclick="submit_remove();">
    <br>
    <a href='admin_account.php'>Click me to go back to admin account!</a>
    
</body>
</html>