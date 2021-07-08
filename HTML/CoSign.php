<?php 
//Cosigner Page
$User = $_COOKIE["User"];
$name = $_COOKIE["Name"];
$EmpPriv = $_COOKIE["Priv"];
$EmpFName = $_COOKIE["Fname"];
$EmpLName = $_COOKIE["Lname"];


?>

<html>
    <head>
        <title>Cosign in!</title>

        <h1 style="color: white; font-size: 20px;">Welcome! You are seeing this page because you have requested to <b>Cosign</b> on the account of <?php echo($EmpFName." ".$EmpLName); ?>. This account type is of a level <?php echo($EmpPriv); ?> In order for you to Co-sign in for this user, your account must be of a higher level than this user. <br />If you accept this, then you must stay at the register with the user mentioned herein, and you will be co-responsible for the actions that they take on this register.</h1>
        <form action="Page2.php" method="post">
            <fieldset>
                <legend style="color: white;">Co Sign</legend>
                <label for="Consent" style="color: white;">Check here to confirm you have read and acknowledge the above text. <br></label> 
                <p style="color: white"><input type="checkbox" style="color: white;" name="Consent" id="Consent">I have read and agree to the terms </p>

                <label for="uname" style="color: white">Username:</label>
                <input type="text" name="uname" id="uname"> <br />
                <label for="pword" style="color: white">Password:</label>
                <input type="password" name="pword" id="pword">
                <input type="submit" value="Sign In!">
            </fieldset>
        </form>
    </head>
    <style>
        html{
            background-color: black;
        }
    </style>
</html>