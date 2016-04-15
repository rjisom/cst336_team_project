<?php
session_start();
$_SESSION['fcart']=$_POST['addToCart'];
$isthisit=$_POST['addToCart'];
var_dump($isthisit);
var_dump($cartArray);
echo $isthisit[0];
echo $_POST['addToCart'][0];
echo $_SESSION['fcart'][0];
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>