<?php

session_start();
if (empty($_SESSION['username'])||empty($_COOKIE['username'])) 
{    
  include('includes/head.php');
echo "<script>
alert('Please go to the index page and login');
window.location.href='members.php';
</script>";
}

else{
$connect=mysql_connect("localhost","root","kanv");
                mysql_select_db("event_manager");
		$username=$_SESSION['username'];
                $queryCheck=mysql_query("
                    SELECT id FROM membersinformationTable where membersinformationTable.uname = '$username'
                ");
$val = mysql_result($queryCheck, 0);
if($val != 1)
{
echo "<script>
alert('You do not have administrative permissions to add or drop tables in databases');
window.location.href='member.php';
</script>";
}

else{

header("Location: admin_access.html");
}
}
?>


