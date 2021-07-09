<?php 

$User = $_COOKIE["User"];
$name = $_COOKIE["Name"];
$EmpPriv = $_COOKIE["Priv"];
$EmpFName = $_COOKIE["Fname"];
$EmpLName = $_COOKIE["Lname"];
$CoSignName = $_COOKIE["CoSignName"];
$CoSignPriv = $_COOKIE["CoSignPriv"];

$CoSignerRegular = FALSE;
$CoSignerElevated = FALSE;

if($CoSignPriv > $EmpPriv)
{
    if($EmpPriv == 1)
    {
        $CoSignerRegular = TRUE;
    }
    if($CoSignPriv == 3)
    {
        $CoSignerElevated = TRUE;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/HomePage.css">
        <title>Register</title>
    </head>
    <body>
        <div class="TopRunner"></div>
        <div class="LeftAscender"></div>

        <?php 
        if($EmpPriv == 1 and $CoSignerRegular == FALSE)
        {
            
            echo('<button id="CSign" class="CosignR">Co-Sign in</button>');            
        }
        if($EmpPriv >= 2 or $CoSignerRegular == TRUE)
        {
            echo('<button id="TStart" class="StartButton Trans">Begin Transaction</button>');
        }
        if($EmpPriv >= 4 or $CoSignerElevated == TRUE)
        {
            echo('<button id="RStart" class="StartButton Ref">Begin Refund</button>');
            echo('<button id="OTill" class="StartButton OTill">Open Till</button>');
            echo('<button id="ATill" class="StartButton ATill">Add Employee To Till</button>');
        }
        if($EmpPriv >= 5)
        {
            echo('<button id="CTill" class="StartButton CTill">Close Till</button>');
        }
        if($EmpPriv >= 6)
        {
            echo('<button id="CPull" class="StartButton CPull">Cash Pull</button>');
            echo('<button id="NSale" class="StartButton NoSale">No Sale</button>');
        }
        if($EmpPriv >= 7)
        {
            echo('<button id="PaidI" class="StartButton PaidI">Paid In</button>');
            echo('<button id="PaidO" class="StartButton PaidO">Paid Out</button>');
        }
        if($EmpPriv >= 8)
        {
            echo('<button id="ViewDB" class="StartButton ViewDB">Open Database</button>');
            echo('<button id="NewEmp" class="StartButton NewEmp">New Employee</button>');
        }
        if($EmpPriv == 10)
        {
            echo('<button id="ViewSource" class="StartButton VSource">View Source Code</button>');
        }
        ?>
        

        

        <div class="InfoBox">
            <p>Signed In As: <?php echo $EmpFName." ".$EmpLName?></p>
            <p>As a: <?php 
                if($EmpPriv == 10)
                {
                    echo "Tech Support Personel";
                }
                if($EmpPriv == 9)
                {
                    echo "Store Owner";
                }
                if($EmpPriv == 8)
                {
                    echo "Backend Manager";
                }
                if($EmpPriv == 7)
                {
                    echo "Store Manager";
                }
                if($EmpPriv == 6)
                {
                    echo "Superuser";
                }
                if($EmpPriv == 5)
                {
                    echo "Hypervisor";
                }
                if($EmpPriv == 4)
                {
                    echo "Supervisor";
                }
                if($EmpPriv == 3)
                {
                    echo "Training Supervisor";
                }
                if($EmpPriv == 2)
                {
                    echo "Cashier";
                }
                if($EmpPriv == 1)
                {
                    echo "Training Cashier";
                }
            
            ?></p>
        </div>



        <!-- Button Keypad -->
        
        

        <script>
        function CoSignIn()
        {
            window.location.href = "CoSign.php";
        }
        
            <?php 
            if($EmpPriv == 1 and $CoSignerRegular == FALSE)
        {
            echo('document.getElementById("CSign").addEventListener("click", CoSignIn);');   
        }
        if($EmpPriv == 3 and $CoSignerElevated == FALSE)
        {
            echo('document.getElementById("CSign").addEventListener("click", CoSignIn);');   
        }
                if($EmpPriv >= 2 or $CoSignerRegular == TRUE)
                {
                    echo('function hello() {
                window.location.href="../PHP/Transactions/Transaction.php"
            }
            document.getElementById("TStart").addEventListener("click", hello);
            ');
                }
                if($EmpPriv >= 4 or $CoSignerElevated == TRUE)
                {
                    echo('function RefundS() {
                    window.location.href = "../PHP/Refund.php"
                }

                function OTill()
                {

                }
                function ATill()
                {

                }
                document.getElementById("RStart").addEventListener("click", RefundS);
                document.getElementById("OTill").addEventListener("click", OTill);
                document.getElementById("ATill").addEventListener("click", ATill);');
                    
                }
                if($EmpPriv >= 5)
                {
                    echo('function CTill()
                {

                }');
                }
                if($EmpPriv >= 6)
                {
                    echo('function CPull()
                {

                }
                function NSale()
                {

                }
                document.getElementById("CTill").addEventListener("click", CTill);
                document.getElementById("CPull").addEventListener("click", CPull);
                document.getElementById("NSale").addEventListener("click", NSale);');
                    
                }
                if($EmpPriv >= 7)
                {
                    echo('function PaidI()
                {

                }
                function PaidO()
                {

                }
                document.getElementById("PaidI").addEventListener("click", PaidI);
                document.getElementById("PaidO").addEventListener("click", PaidO);');
                    
                }
                if($EmpPriv >= 8)
                {
                    echo('function ViewDB()
                {

                }
                function NewEmp()
                {

                }
                document.getElementById("ViewDB").addEventListener("click", ViewDB);
                document.getElementById("NewEmp").addEventListener("click", NewEmp);');
                    
                }
                if($EmpPriv == 10)
                {
                    echo('function ViewSource()
                {
                    window.open("./MainPage.txt")
                }
                document.getElementById("ViewSource").addEventListener("click", ViewSource);');
                }
            ?>
            
            

            
                
                
                
                
                

                
                
                
                
                
                
                
                
        </script>

    </body>
    
</html>
<?php 
function ReadDataNE($query, $data)
{
    $servername = "localhost:3308";
    $username = "prgmUsr";
    $password = "Program123!";
    $dbname = "BankofPilla";
    echo $query."<br \>".$data;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = $query;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            return $row[$data];
        }		
    }
}

function ReadData($query, $data)
{
    $servername = "localhost:3308";
    $username = "prgmUsr";
    $password = "Program123!";
    $dbname = "BankofPilla";
    echo $query."<br \>".$data;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = $query;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            foreach($row as $datas)
            {
                echo $datas;
            }
        }		
    }
}
?>