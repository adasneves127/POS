<?php 
$User = $_COOKIE["User"];
$name = $_COOKIE["Name"];
$EmpPriv = $_COOKIE["Priv"];
$EmpFName = $_COOKIE["Fname"];
$EmpLName = $_COOKIE["Lname"];
$CoSignName = $_COOKIE["CoSignName"];
$CoSignPriv = $_COOKIE["CoSignPriv"];

if($EmpPriv >= 1)
{
}
else
{
    echo "<script> window.location.href = '../../../index.html';";
}

?>


<html>
    <head>
        <link rel="stylesheet" href="../../CSS/TransStyle.css">
    </head>
    <body>
        <div class="RightNavBar"></div>
    </body>
</html>