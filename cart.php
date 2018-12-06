<!-- 
Name(s): Trevor Crow, Cameron Foster
Date: 11/27/2018
Description: home page of web store
 -->
<?php
    session_start();
?>
 <!DOCTYPE html>
 <html>
     <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="layout.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
        <link rel="stylesheet" type="text/css" href="cart.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
     </head>
     <body>
        <!-- background -->
        <div class="background"></div>
        
        <!-- header that also contains navigation-->

        <!-- desktop navigation -->
        <header id="desktop" class="col-12">
            <?php
                if(!isset($_SESSION["username"])){
                    //login/signup
                    echo "<p class='float-left'><a href='loginpage.php'>Login</a> or <a href='SignUppage.php'>Create an Account</a></p>";
                }else{//logged in so we show log out and grettings
                    echo "<p class='float-left'>Welcome, ".$_SESSION["username"]."<br><a href='logout.php'>Logout</a></p>";
                }
            ?>
            <!-- navigation -->
            <nav class="float-right">
                <ul>
                    <li><a href="home-page.php">Home</a></li>
                    <li><a href="catalog.php">Catalog</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                </ul>
            </nav>
        </header>

        <!-- smaller device navigation -->
        <header id="smallerdevice" class="col-12">
            <nav class="float-left">
                <ul>
                   <li><a href="home-page.php"><img src="images/home.png" width="32px" height="32px" align="middle"></a></li>
                   <li><a href="catalog.php"><img src="images/catalog.png" width="32px" height="32px" align="middle"></a></li>
                   <li><a href="cart.php"><img src="images/shopping-cart.png" width="32px" height="32px" align="middle"></a></li>
                   <?php
                        if(!isset($_SESSION["username"])){
                            echo "<li><a href='loginpage.php'><img src='images/profile.png' width='32px' height='32px' align='middle'></a></li>";
                        }else{
                            echo "<li><a href='logout.php'><img src='images/logout.png' width='32px' height='32px' align='middle'></a></li>";
                        }
                   ?>
                   
                </ul>
            </nav>
        </header>
        
        <form action="processorder.php" method="post" class="cart col-8">
            <h1><img class="logo" src="images/soda.png" width="36px" height="36px">Your Cart,</h1>
            <br>
            <ul>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "floodingbeveragesdb";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                $sql = "SELECT drink, quantity FROM orders WHERE userid='".$_SESSION["id"]."'"; 
                $result = $conn->query($sql);
                $total_cost = 0;
                while($row = $result->fetch_assoc()){
                    $sql = "SELECT drinkname, price FROM soda_stock WHERE drinkid='".$row["drink"]."'";
                    $result2 = $conn->query($sql);
                    $row2 = $result2->fetch_assoc();
                    
                    echo "<li>";
                    echo $row2["drinkname"];
                    echo "<br>Cost: ";
                    echo $row2["price"]."x".$row["quantity"];
                    echo "</li>";
                    $total_cost += floatval($row2["price"])*floatval($row["quantity"]);
                }
                echo "</ul><hr>";
                echo "<p>Total Cost: $".$total_cost."</p>";

                $conn->close();
            ?>

            <input id="button" type="submit" value="Purchase">
        </form>
     </body>
 </html>






            