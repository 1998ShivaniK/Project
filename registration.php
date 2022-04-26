registration.php

<?php
session_start();
header('location:loginandregister.php');
$connection=mysqli_connect('localhost','root','shivakesh2');
//$connection=mysqli_connect('localhost','root','write your password here')

mysqli_select_db($connection,'loginandregistrationform');

$name=$_POST['user'];
$email=$_POST['emailid'];
$password=$_POST['password'];

$select="select * from register_table where email_id='$email'";
$result=mysqli_query($connection,$select);
$num=mysqli_num_rows($result);
if($num==1)
{
    echo" user already exists";
}
else
{
    $reg="insert into register_table(name,email_id,password) values('$name','$email','$password')";
    mysqli_query($connection,$reg);
}
?>


validate.php

<?php
session_start();

$connection=mysqli_connect('localhost','root','shivakesh2');
//$connection=mysqli_connect('localhost','root','write your password here')

mysqli_select_db($connection,'loginandregistrationform');

$email=$_POST['emailid'];
$password=$_POST['password'];

$select="select * from register_table where email_id='$email' && password='$password'";
$result=mysqli_query($connection,$select);
$num=mysqli_num_rows($result);
if($num==1)
{
    header('location:app.php');
}
else
{
    header('location:loginandregister.php');
}
?>


app.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>app screen</title>
</head>
<body>
   
    <a href="logout.php"><button>logout</button></a>
    
    <h1>Hi! Guys welcome to Seek Coding Youtube Channel<br>If You Are New to my channel, please     do Subscribe to my channel and <br> like, share video if you found the tutorial is interesting...
    <br>Thankyou.....</h1>
    
</body>
</html>

logout.php

<?php

session_start();
session_destroy();

header('location:loginandregister.php');

?>
                                  sql file.sql
create database loginandregistrationform;
use loginandregistrationform;
create table register_table(name varchar(30),email_id varchar(50) primary key,password varchar(20));
