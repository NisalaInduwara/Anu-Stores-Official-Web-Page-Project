<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ANU STORES OFFICIAL WEBSITE</title>
<style>
    body {font-family: Arial;}
    h6{
        color: rgb(7, 80, 23);
        font-size: 0.8cm;
        margin-top: 0px;
    }

    table{
    border: 1px solid black;
    width: 100%;
    }

    th, td {
    border: 1px solid black;
    text-align: center;
    }

    </style>
</head>
<body>
    <h6>
<?php

    if(isset($_POST['orderadd'])){

        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }

        $ItemID = $_REQUEST['itemID'];
        $OrderID = $_REQUEST['orderID'];
        $Date = $_REQUEST['Date'];
        $SoldPrice = $_REQUEST['SPrice'];
        $BuyingPrice = $_REQUEST['BPrice'];
        $Profit = $_REQUEST['profit'];
        $TrackingNumber = $_REQUEST['TNumber'];
        $Description = $_REQUEST['desc'];
        $Quantity = $_REQUEST['quantity'];

        $Data = "INSERT INTO orderdetails VALUES ('$OrderID', '$SoldPrice', '$BuyingPrice', '$Profit','$TrackingNumber', 
        '$ItemID','$Description', '$Date', '$Quantity')";
        
        if($conn->query($Data)){
            echo "<br /><h1> Data inserted successfully.</h1><br />";
        }
        if($conn->error){
            die("<br /><h1> Coulod not insert data into the table: </h1>" . $conn->error . "<br />");
        }
    }



    else if(isset($_POST['buyeradd'])){

        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }

        $OrderID = $_REQUEST['orderID'];
        $Name = $_REQUEST['Name'];
        $UserName = $_REQUEST['username'];
        $Country = $_REQUEST['Country'];
        $PhoneNumber = $_REQUEST['mobNumber'];
        $Address = $_REQUEST['address'];
        $State = $_REQUEST['state'];
        $City = $_REQUEST['city'];
        $Zip = $_REQUEST['zip'];
        

        $Data = "INSERT INTO buyer_details VALUES ('$Name', '$UserName', '$Address', '$City','$State', 
        '$PhoneNumber','$Zip', '$Country', '$OrderID')";       

        if($conn->query($Data)){
            echo "<br /><h1> Data inserted successfully.</h1><br />";
        }
        if($conn->error){
            die("<br /><h1> Coulod not insert data into the table: </h1>" . $conn->error . "<br />");
        }

        $conn->close();
    }



    else if (isset($_POST['aliadd'])){

        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }

        $OrderID = $_REQUEST['orderID'];
        $Link = $_REQUEST['link'];
        $AliID= $_REQUEST['AliID'];

        $Data = "INSERT INTO ali_details VALUES ('$AliID', '$Link', '$OrderID')";


        if($conn->query($Data)){
            echo "<br /><h1> Data inserted successfully.</h1><br />";
        }
        if($conn->error){
            die("<br /><h1> Coulod not insert data into the table: </h1>" . $conn->error . "<br />");
        }
    }

    else if (isset($_POST['itemadd'])){

        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }

        $itemName = $_REQUEST['Name'];
        $Link = $_REQUEST['Link'];
        $itemID= $_REQUEST['ID'];

        $Data = "INSERT INTO items VALUES ('$itemID', '$itemName', '$Link')";
        
        if($conn->query($Data)){
            echo "<br /><h1> Data inserted successfully.</h1><br />";
        }
        if($conn->error){
            die("<br /><h1> Coulod not insert data into the table: </h1>" . $conn->error . "<br />");
        }

        $conn->close();
    }


    else if (isset($_POST['profit'])){

        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }

        if(isset($_POST['Month'])){

            $month = $_REQUEST['Month'];

            $display = "SELECT SUM(PROFIT) as MonthlyProfit FROM OrderDetails where month(date) = $month";
            $display_result = $conn->query($display);
            
            if($display_result->num_rows>0){
                while($row = $display_result->fetch_assoc()){
                        printf("$%.2f",$row["MonthlyProfit"]);
                }
            }else{
                echo "No records fround in the table.<br />";
            }
        }else{
            echo "Please Enter The Month To Get The Link.<br />";
        }

        $conn->close();
    }

    else if (isset($_POST['getLink'])){
        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }


        if(isset($_POST['ItemID'])){

        $ItemID = $_REQUEST['ItemID'];
        
            $display = "SELECT DISTINCT Link as LinkList FROM items where item_number = $ItemID";
            $display_result = $conn->query($display);
            
            if($display_result->num_rows>0){
                while($row = $display_result->fetch_assoc()){
                        printf("%s",$row["LinkList"]);
                                }
            }else{
                echo "No records fround in the table.<br />";
            }
        }
        else{
            echo "Please Enter The Item ID To Get The Link.<br />";
        }

    $conn->close();
    }

    else if (isset($_POST['orderDetails'])){
        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }


        if(isset($_POST['OrderID'])){

        $OrderID = $_REQUEST['OrderID'];
            
            $display = "SELECT tracking_number, itemID, description, date, quantity FROM orderdetails where order_number = '$OrderID'";
            $display_result = $conn->query($display);
            
            if($display_result->num_rows>0){

                echo "<table>
                <tr>
                <th>Tracking Number</th>
                <th>Item ID</th>
                <th>Description</th>
                <th>Quantity</th>
                </tr>";

                while($row = $display_result->fetch_assoc()){
                    echo "<tr>
                    <td>" . $row["tracking_number"]. "</td>
                    <td>" . $row["itemID"]. "</td>
                    <td>" . $row["description"]. "</td>
                    <td>" . $row["quantity"]. "</td>
                         </tr>";
                }
                echo "</table>";            
            }else{
                echo "No records fround in the table.<br />";
            }
        }
        else{
            echo "Please Enter The Item ID To Get The Link.<br />";
        }

        $conn->close();
    }



    else if (isset($_POST['buyerDetails'])){
        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }
        

        if(isset($_POST['OrderID'])){

        $OrderID = $_REQUEST['OrderID'];

            $display = "SELECT name, username, address, city, state, phonenumber, zipcode, nic FROM buyer_details where orderid = '$OrderID'";
            $display_result = $conn->query($display);
            
            if($display_result->num_rows>0){

                echo "<table>
                <tr>
                <th>Buyer Name</th>
                <th>Username</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Mobile Number</th>
                <th>Zip Code</th>
                <th>NIC</th>
                </tr>";

                while($row = $display_result->fetch_assoc()){
                    echo "<tr>
                    <td>" . $row["name"]. "</td>
                    <td>" . $row["username"]. "</td>
                    <td>" . $row["address"]. "</td>
                    <td>" . $row["city"]. "</td>
                    <td>" . $row["state"]. "</td>
                    <td>" . $row["phonenumber"]. "</td>
                    <td>" . $row["zipcode"]. "</td>
                    <td>" . $row["nic"]. "</td>
                         </tr>";
                }
                echo "</table>";            
            }else{
                echo "No records fround in the table.<br />";
            }
        }
        else{
            echo "Please Enter The Item ID To Get The Link.<br />";
        }

        $conn->close();
    }

    else if (isset($_POST['aliDetails'])){
        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }
        

        if(isset($_POST['OrderID'])){

        $OrderID = $_REQUEST['OrderID'];

            $display = "SELECT aliorderID FROM ali_details where orderid = '$OrderID'";
            $display_result = $conn->query($display);
            
            if($display_result->num_rows>0){

                echo "<table>
                <tr>
                <th>Ali Order ID</th>
                </tr>";

                while($row = $display_result->fetch_assoc()){
                    echo "<tr>
                    <td>" . $row["aliorderID"]. "</td>
                         </tr>";
                }
                echo "</table>";            
            }else{
                echo "No records fround in the table.<br />";
            }
        }
        else{
            echo "Please Enter The Item ID To Get The Link.<br />";
        }

        $conn->close();
    }

    else if (isset($_POST['orderID'])){
        $servername = "localhost";
        $username = "root";
        $password = "Gango@99ns";

        $conn = mysqli_connect($servername, $username, $password);

        if($conn === false){
            die("Connection failed: " . mysqli_connect_error() . "<br />");
            exit();
        }

        $select = mysqli_select_db($conn, 'EBAY');

        if(! $select){
            die('Could not select a database: ' . mysqli_error($conn));
        }
        
        $AliOrderID = $_REQUEST['AliID'];
        $UserName = $_REQUEST['username'];

        if(isset($_POST['AliID']) || isset($_POST['username'])){
            
            $display = "SELECT orderID FROM ali_details where aliorderid = '$AliOrderID'";
            $display_result = $conn->query($display);

            $display1 = "SELECT orderID FROM buyer_details where username = '$UserName'";
            $display_result1 = $conn->query($display1);
            
            if($display_result->num_rows>0){

                echo "<table>
                <tr>
                <th>Ebay Order ID</th>
                </tr>";

                while($row = $display_result->fetch_assoc()){
                    echo "<tr>
                    <td>" . $row["orderID"]. "</td>
                         </tr>";
                }
                echo "</table>";  

            }else if($display_result1->num_rows>0){

                echo "<table>
                <tr>
                <th>Ebay Order ID</th>
                </tr>";

                while($row = $display_result1->fetch_assoc()){
                    echo "<tr>
                    <td>" . $row["orderID"]. "</td>
                         </tr>";
                }
                echo "</table>";

            }else{
                echo "No records fround in the table.<br />";
            }   
        }

        else{
            echo "Please Enter The Item ID To Get The Link.<br />";
        }

        $conn->close();
    }


?>
   </h6>

</body>
</html> 
