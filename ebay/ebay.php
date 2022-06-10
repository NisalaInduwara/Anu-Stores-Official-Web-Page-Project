<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ANU STORES OFFICIAL WEBSITE</title>
<style>
    body {font-family: Arial;}

    .header{
        width: 100%;
        height: 53vh;
        background-image: url(back1.png);
        background-position: center;
        background-position: cover;
        background-repeat: no-repeat;
        padding-bottom: 0px;
    }

    .tab {
        overflow: hidden;
        background-color: black;
        display: inline-block;
        list-style: none;
        margin-top: 0px;
        padding: 20px 3%;
        background-color: #000;
        display: flex;
        align-items: center;
        justify-content: space-between;
        

    }

    .tab button {
        background-color: yellow;
        float: center;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 15px 50px;
        transition: 0.3s;
        font-size: 15px;
        align: center;
        text-align: center;
    }

    h1{
        color: rgb(233, 27, 147);
        font-size: 2cm;
        margin: 0px 0px;
        padding-top: 15px;
        padding-bottom: 40px;
    }

    h3{
        color: rgb(7, 80, 23);
        font-size: 1.5cm;
        padding-top: 35px;
    }

    h2{
        color: rgb(7, 80, 23);
        font-size: 1.5cm;
        padding-top: 5px;
    }

    h4{
        color: rgb(7, 80, 23);
        font-size: 1.2cm;
        margin-top: 50px;
    }

    h6{
        color: rgb(7, 80, 23);
        font-size: 1.2cm;
        margin-top: 0px;
    }
   
    .logo{
            width: 175px;
            height: 125px;
            margin: 0;
            padding: 20px 42%;
    }

    .tab button:hover {
            background-color: red;
    }

    .tabcontent {
        display: none;
    }

    input[type=submit] {
        background-color: red;
        border: none;
        color: white;
        padding: 16px 80px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
        width: 300px
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }
    
    input[type=button] {
        background-color: green;
        border: none;
        color: white;
        padding: 16px 60px;
        text-decoration: none;
        margin: 4px 2px;
        width: 300px;
        cursor: pointer;
    }


    </style>
</head>


<body>
<div class="header">
        <img src="l.png" class="logo" alt="logo" >
        <h1 align = "center">WELCOME TO ANU STORES</h1>
            <div class="tab">
                <button class="tablinks" onclick="getOption(event, 'Home')" id="HomeTab">Home</button>
                <button class="tablinks" onclick="getOption(event, 'Order Details')">Order Details</button>
                <button class="tablinks" onclick="getOption(event, 'Buyer Details')">Buyer Details</button>
                <button class="tablinks" onclick="getOption(event, 'Ali Express Details')">Ali Express Details</button>
                <button class="tablinks" onclick="getOption(event, 'Item Details')">Item Details</button>
                <button class="tablinks" onclick="getOption(event, 'Search Details')">Search Details</button>
            </div>
            
</div> 



<div id="Home" class="tabcontent">
    <table width = 100% border = "0" cellspacing = "0" cellpadding = "0" align="center" >
                <tr>
                    <td width = "500" align = "center"><h4>Total Profit Up To Date</h4></td>
                    <td width = "500" align = "center"><h4>Quantity Sold Up To Date</h4></td>
                </tr>
                <tr>
                    <td width = "500" align = "center"><h6>
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "Gango@99ns";
                    
                            $conn = new mysqli($servername, $username, $password);
                    
                            if($conn->connect_error){
                                die("Connection failed: " . $conn->connect_error . "<br />");
                                exit();
                            }
                    
                            $select = mysqli_select_db($conn, 'EBAY');
                    
                            if(! $select){
                                die('Could not select a database: ' . mysqli_error($conn));
                            }

                            $display = "SELECT SUM(PROFIT) as TotalProfit FROM OrderDetails";
                            $display_result = $conn->query($display);
            
                            if($display_result->num_rows>0){
                                while($row = $display_result->fetch_assoc()){
                                    printf("$%.2f",$row["TotalProfit"]);
                                }
                            }else{
                                echo "No records fround in the table.<br />";
                            }
                        ?>
                    </h6></td>
                    <td width = "500" align = "center"><h6>
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "Gango@99ns";
                    
                            $conn = new mysqli($servername, $username, $password);
                    
                            if($conn->connect_error){
                                die("Connection failed: " . $conn->connect_error . "<br />");
                                exit();
                            }
                    
                            $select = mysqli_select_db($conn, 'EBAY');
                    
                            if(! $select){
                                die('Could not select a database: ' . mysqli_error($conn));
                            }

                            $display = "SELECT SUM(QUANTITY) as TotalQuantity FROM OrderDetails";
                            $display_result = $conn->query($display);
            
                            if($display_result->num_rows>0){
                                while($row = $display_result->fetch_assoc()){
                                    printf("%d",$row["TotalQuantity"]);
                                }
                            }else{
                                echo "No records fround in the table.<br />";
                            }
                        ?>
                        </h6></td>
                </tr>
            </table>
</div>



<div id="Order Details" class="tabcontent">
<form method = "post" action="action.php" id='order'>
    <h2 align = "center">Insert Your Order Details Here</h2>
    <table width = "1000" border = "0" cellspacing = "0" cellpadding = "0" align="center">
                <tr>
                    <td width = "300" align="center" height="25">Item Number</td>
                    <td align="center" width = "400"><input name = "itemID" type = "text" id = "itemID" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">Order Number</td>
                    <td align="center" width = "400"><input name = "orderID" type = "text" id = "orderID" required></td>
                </tr>

                <tr>
                    <td width = "300" align="center" height="25">Date</td>
                    <td align="center" width = "400"><input name = "Date" type = "text" id = "Date" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">Sold Price</td>
                    <td align="center" width = "400"><input name = "SPrice" type = "text" id = "SPrice" required></td>
                </tr>

                <tr>
                    <td width = "300" align="center" height="25">Buying Price</td>
                    <td align="center" width = "400"><input name = "BPrice" type = "text" id = "BPrice" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">Net Profit</td>
                    <td align="center" width = "400"><input name = "profit" type = "text" id = "profit" required></td>
                </tr>

                <tr>
                    <td width = "250" align="center" height="25">Tracking Number</td>
                    <td align="center" width = "400"><input name = "TNumber" type = "text" id = "TNumber" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">Discription</td>
                    <td align="center" width = "400"><input name = "desc" type = "text" id = "desc" required></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                    
                </tr>
                
                <tr>
                    <td width = "250" align="center" height="25">Quantity</td>
                    <td align="center" width = "400"><input name = "quantity" type = "text" id = "quantity" required></td>
                    <td width = "50" height="25"></td>
                    <td align="right" width = "250"><input type="button" onclick="clearOrder()" value="RESET"></td>
                    <td align="right" width = "250"><input name = "orderadd" type = "submit" id = "orderadd" value = "ENTER"></td>
                    
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                    
                </tr>
            </table>
</form>
</div>



<div id="Buyer Details" class="tabcontent">
<form method = "post" action = "action.php" id='buyer'>
    <h2 align = "center">Insert The Buyer Details Here</h2>
    <table width = "1000" border = "0" cellspacing = "0" cellpadding = "0" align="center">
                <tr>
                    <td width = "300" align="center" height="25">Order Number</td>
                    <td align="center" width = "400"><input name = "orderID" type = "text" id = "orderID" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">Buyer Name</td>
                    <td align="center" width = "400"><input name = "Name" type = "text" id = "Name" required></td>
                </tr>

                <tr>
                    <td width = "300" align="center" height="25">Username</td>
                    <td align="center" width = "400"><input name = "username" type = "text" id = "username" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">Country</td>
                    <td align="center" width = "400"><input name = "Country" type = "text" id = "Country" required></td>
                </tr>

                <tr>
                    <td width = "300" align="center" height="25">Phone Number</td>
                    <td align="center" width = "400"><input name = "mobNumber" type = "text" id = "mobNumber" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">Address</td>
                    <td align="center" width = "400"><input name = "address" type = "text" id = "address" required></td>
                </tr>

                <tr>
                    <td width = "300" align="center" height="25">City</td>
                    <td align="center" width = "400"><input name = "city" type = "text" id = "city" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">State</td>
                    <td align="center" width = "400"><input name = "state" type = "text" id = "state" required></td>
                </tr>

                <tr>
                    <td width = "300" align="center" height="25">Zip Code</td>
                    <td align="center" width = "400"><input name = "zip" type = "text" id = "zip" required></td>
                    <td width = "50" height="25"></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                    <td width = "250" height="25"></td>
                    <td width = "50" height="25"></td>
                    <td align="right" width = "250"><input type="button" onclick="clearBuyer()" value="RESET"></td>
                    <td align="right" width = "250"><input name = "buyeradd" type = "submit" id = "buyeradd" value = "ENTER"></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                </tr>
            </table>
</form>
</div>



<div id="Ali Express Details" class="tabcontent">
<form method = "post" action = "action.php" id='ali'>
    <h2 align = "center">Insert The Ali Express Order Details Here</h2>
    <table width = "1300" border = "0" cellspacing = "0" cellpadding = "0" align="center">
                <tr>
                    <td width = "300" align="center" height="25">Order Number</td>
                    <td align="center" width = "400"><input name = "orderID" type = "text" id = "orderID" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">Store Link</td>
                    <td align="center" width = "800"><input name = "link" type = "text" id = "link" required></td>
                </tr>

                <tr>
                    <td width = "300" align="center" height="25">Ali Express Order ID</td>
                    <td align="center" width = "400"><input name = "AliID" type = "text" id = "AliID" required></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                    <td width = "250" height="25"></td>
                    <td width = "50" height="25"></td>
                    <td align="right" width = "250"><input type="button" onclick="clearAli()" value="RESET"></td>
                    <td align="right" width = "250"><input name = "aliadd" type = "submit" id = "aliadd" value = "ENTER"></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                </tr>
            </table>
</form>
</div>



<div id="Item Details" class="tabcontent">
<form method = "post" action = "action.php" id='item'>
    <h2 align = "center">Insert Item Details Here</h2>
    <table width = "1000" border = "0" cellspacing = "0" cellpadding = "0" align="center">
                <tr>
                    <td width = "300" align="center" height="25">Item Name</td>
                    <td align="center" width = "400"><input name = "Name" type = "text" id = "Name" required></td>
                    <td width = "50" height="25"></td>
                    <td width = "250" align="center" height="25">Ali Express Link</td>
                    <td align="center" width = "800"><input name = "Link" type = "text" id = "Link"></td>
                </tr>

                <tr>
                    <td width = "300" align="center" height="25">Item Number</td>
                    <td align="center" width = "400"><input name = "ID" type = "text" id = "ID"></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                    <td width = "250" height="25"></td>
                    <td width = "50" height="25"></td>
                    <td align="right" width = "250"><input type="button" onclick="clearItem()" value="RESET"></td>
                    <td align="right" width = "250"><input name = "itemadd" type = "submit" id = "itemadd" value = "ENTER"></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                </tr>
            </table>
</form>
</div>



<div id="Search Details" class="tabcontent">
<form method = "post" action = "action.php" id='search'>
    <h2 align = "center">Search Items Details Here</h2>
    <table width = "1000" border = "0" cellspacing = "0" cellpadding = "0" align="center">
                <tr>
                    <td width = "150" align="left" height="25">Enter The Month</td>
                    <td align="center" width = "300"><input name = "Month" type = "text" id = "Month"></td>
                    <td width = "250" align="center" height="25">Enter The Item Number</td>
                    <td align="center" width = "300"><input name = "ItemID" type = "text" id = "ItemID"></td>
                </tr>

                <tr>
                    <td width = "150" align="left" height="25">Enter The Order ID</td>
                    <td align="center" width = "300"><input name = "OrderID" type = "text" id = "OrderID"></td>
                    <td width = "250" align="center" height="25">Enter The Ali Order ID</td>
                    <td align="center" width = "300"><input name = "AliID" type = "text" id = "AliID"></td>
                </tr>

                <tr>
                    <td width = "150" align="left" height="25">Enter The User Name</td>
                    <td align="center" width = "300"><input name = "username" type = "text" id = "username"></td>
                </tr>

                <tr>
                    <td width = "50" height="25"></td>
                    <td width = "50" height="25"></td>
                </tr>
                
                </table>

    <table width = "1000" border = "0" cellspacing = "0" cellpadding = "0" align="center">

                <tr>
                    <td width = "50" height="25"></td>
                    <td width = "50" height="25"></td>
                </tr>

                <tr>
                    <td align="center" width = "250"><input name = "profit" type = "submit" id = "profit" value = "MONTHLY PROFIT"></td>
                    <td align="center" width = "250"><input name = "getLink" type = "submit" id = "getLink" value = "GET LINK"></td>
                    <td align="center" width = "250"><input name = "orderDetails" type = "submit" id = "orderDetails" value = "GET ORDER DETAILS"></td>
                </tr>

                <tr>
                    <td width = "50" height="25"></td>
                    <td width = "50" height="25"></td>
                </tr>

                <tr>
                    <td align="center" width = "250"><input name = "buyerDetails" type = "submit" id = "buyerDetails" value = "GET BUYER DETAILS"></td>
                    <td align="center" width = "250"><input name = "aliDetails" type = "submit" id = "aliDetails" value = "GET ALI DETAILS"></td>
                    <td align="center" width = "250"><input name = "orderID" type = "submit" id = "orderID" value = "GET EBAY ORDER ID"></td>
                </tr>

                <tr>
                    <td width = "50" height="25"></td>
                    <td width = "50" height="25"></td>
                </tr>

                <tr>
                    <td align="center" width = "350"></td>
                    <td align="right" width = "300"><input type="button" onclick="clearSearch()" value="RESET"></td>
                    <td align="center" width = "350"></td>
                </tr>

                <tr>
                    <td width = "250" height="25"></td>
                </tr>
            </table>
</form>
</div>



<script>
function getOption(evt, option) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(option).style.display = "block";
  evt.currentTarget.className += " active";
}

function clearBuyer() {
  document.getElementById("buyer").reset();
}

function clearOrder() {
  document.getElementById("order").reset();
}

function clearAli() {
  document.getElementById("ali").reset();
}

function clearItem() {
  document.getElementById("item").reset();
}

function clearSearch() {
  document.getElementById("search").reset();
}

document.getElementById("HomeTab").click();

</script>

</body>
</html>


