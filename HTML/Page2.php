<?php
	$name = $_POST["uname"];
	$simple_string = $_POST["pword"];

// Store the cipher method
$ciphering = "AES-128-CTR";

// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '866138824769195395';

// Store the encryption key
$encryption_key = "MaitenenceKnowledgeControl";

echo $simple_string. $ciphering. $encryption_key. $options. $encryption_iv."<br />";

// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($simple_string, $ciphering,
            				  $encryption_key, $options, $encryption_iv);
	echo $encryption;

$servername = "localhost:3308";
$username = "prgmUsr";
$password = "Program123!";
$dbname = "POS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Employees where EmpUName = '$name'";
echo "<br />".$sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  	// output data of each row
  	while($row = $result->fetch_assoc()) {

		if($row["EmpPWord"] == $encryption)
		{
			
			setcookie("CoSignName", $name, time() + 3600);
			setcookie("CoSignPriv", $row["EmpPriv"]);
			echo "<script>window.location.href='MainPage.php';</script>";



		}
		else
		{
			echo '<script> alert("Username or Password Invalid!");
			';
			echo "window.location.href='index.html';</script>";

		}
  	}
	} else {
  echo "0 results";
  echo '<script> alert("Username or Password Invalid!");
			';
			echo "window.location.href='index.html';</script>";
}
$conn->close();
	$_SESSION["User"] = $encryption;

?>
<html>
<body>
<style>
*{
	/*background-color: #000000*/
}
</style>

<script>
  //window.location.replace("../page2/");
</script>
</body>
</html>
