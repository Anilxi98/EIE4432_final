<html>
<head>
    <title> View result
    </title>
    <script>
        function view_name(){
            var myRequest = new XMLHttpRequest();
			myRequest.open("GET", "get_finish_student.php?q=",true);
			myRequest.send();
			myRequest.onload = function(){
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
        }

        function submit_view(){
            var sel = document.getElementById("student_finish");
            var student_finish = sel.options[sel.selectedIndex].text;
            var myRequest = new XMLHttpRequest();
			myRequest.open("GET", "get_student_result.php?q="+student_finish,true);
			myRequest.send();
			myRequest.onload = function(){
				document.getElementById("txtHint2").innerHTML = this.responseText;
			}
        }

        function submit_view_statistics(){
            document.statistics.action="view_statistics.php";
            document.statistics.submit();
        }
    </script>
</head>
<body onload="view_name();">
    Please choose one student to view his/her result:
    <br>
    <span id="txtHint"></span>
    <br>
    <input type = "button" value = "Click me to View" onclick="submit_view();">
    <br>
    <form action = "" method = "post" name = "statistics">
    <input type = "button" value = "Click me to View the statistics" onclick="submit_view_statistics();">
    </form>
    <br>
    <span id="txtHint2"></span>
</body>
</html>
