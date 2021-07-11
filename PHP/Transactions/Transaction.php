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
    echo "<script> window.location.href = '../../../index.html'; </script>";
}

?>


<html>
    <head>
        <link rel="stylesheet" href="..\..\CSS\TransStyle.css">
        <title>Transaction In Progress</title>
    </head>
    <body>
        <div class="RightNavBar">
            <p class="StatusBox" id="Status">Test</p>
            <button class="Trans Cancel">Cancel Transaction</button>
            <button class="Trans PLU">PLU Query</button>
            <button class="Trans UPC">UPC Query</button>
            <button class="Trans TendPay">Tender Payment</button>
        </div>
        <div style="width: 1600px;
                    height: 900px;
                    background: white;
                    top: 140px;
                    left: 40px;">
                <pre id="TransactionItems"></pre>    
                </div>
        <div style="top: 100px; left: 40px;">
            <label for="InputBox" style="Color: white;">Enter Next Code: </label>
            <input type="text" name="InputBox" id="InputBox" >
            <button onclick="AddItem()">Add Item</button>
        </div>
        
    </body>
    <script>
        document.getElementById("Status").innerHTML = "Ready for Next Entry";
        function AddItem()
        {
            console.log(document.getElementById("InputBox").value);
            
            var textToAdd = document.createTextNode(document.getElementById("InputBox").value + "\n");
            document.getElementById("TransactionItems").appendChild(textToAdd);
        }
    </script>
</html>