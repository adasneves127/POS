<?php 
//Get all of out cookies right when the site loads, yes, I know it is more efficient to use an array, but that is something we will have to deal with.
//Also, $_COOKIE won't work after the <html> tag... i wish it didn't behave like this, but that is how it is...
$User = $_COOKIE["User"];
$name = $_COOKIE["Name"];
$EmpPriv = $_COOKIE["Priv"];
$EmpFName = $_COOKIE["Fname"];
$EmpLName = $_COOKIE["Lname"];
$CoSignName = $_COOKIE["CoSignName"];
$CoSignPriv = $_COOKIE["CoSignPriv"];
$ColorTheme = $_COOKIE["Color"];

//If our user is actually signed in, do nothing, otherwise, go back to the home page.
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
        <?php 
        $link = "..\..\CSS\\$ColorTheme\TransStyle.css";
        ?>
        <link rel="stylesheet" href=<?php echo $link ?>>
        <title>Transaction In Progress</title>
    </head>
    <body>
        <!-- Creates the row of buttons on the right side of the page. -->
        <div class="RightNavBar">
            <p class="StatusBox" id="Status">Test</p>
            <button class="Trans Cancel" onclick="window.location.href = '../../../HTML/MainPage.php'">Cancel Transaction</button>
            <button class="Trans PLU">PLU Query</button>
            <button class="Trans UPC">UPC Query</button>
            <button class="Trans TendPay">Tender Payment</button>
        </div>
        <!-- Creates a white box that all of the items from the transaction will go into, plans for the future: have user customizeable colors on the terminal. -->
        <div class="TransItems"><pre id="TransactionItems" style="padding: -20px;"></pre>    
                </div>
        <div style="top: 100px; left: 40px;">
            <label for="InputBox" style="Color: white;">Enter Next Code: </label>
            <input type="text" name="InputBox" id="InputBox" >
            <button onclick="AddItem()">Add Item</button>
        </div>
        
    </body>
    
    
    <!-- Boring Javascript Stuff, Move Along... -->
    <script>
        document.getElementById("Status").innerHTML = "Ready for Next Entry";
        function AddItem()
        {
            console.log(document.getElementById("InputBox").value);
            var RawText = document.getElementById("InputBox").value;
            
            var textToAdd = document.createTextNode(GenerateItemBorder(RawText, 60, true));
            document.getElementById("TransactionItems").appendChild(textToAdd);
        }
        function GenerateItemBorder(Input, length, NewLine)
        {
            console.log(Input);
            var Output = "";
            var WorkingOut = Input.split("");

            for (let index = 0; index < length; index++) {
                if(index < Input.length)
                    Output += WorkingOut[index];
                else
                    Output += " ";
            }
            Output += "|"
            if(NewLine)
            {
                Output += "\n";
            }

            console.log(Output);
            return Output;
            
        }
        function ClearBox()
        {
            document.getElementById("TransactionItems").innerHTML = "";
        }
        //Box is 224 characters wide by 59 lines tall
        function TopRows()
        {
            
        }
    </script>
</html>