<!-- 
Name(s): Trevor Crow, Cameron Foster
Date: 11/30/2018
Description: catalog page
-->
<?php
    session_start();
?>

 <!DOCTYPE html>
 <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="layout.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
        <link rel="stylesheet" type="text/css" href="items.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
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
       
        <!-- catalog -->
        <br>
        <br>
        <section id="catalog">
            <ul>
                <li><div><button class="item-0" onclick="amount('0')"><p class="name" id="0">Rough Snake</p><p id="total">In Stock: <?php echo @$_SESSION["amount0"]; ?></p></div></li>
                <li><div><button class="item-1" onclick="amount('1')"><p class="name" id="1">Lemon lager</p><p id="total">In Stock: <?php echo @$_SESSION["amount1"]; ?></p></div></li>
                <li><div><button class="item-2" onclick="amount('2')"><p class="name" id="2">Passion fruit buzzer (kiwi java)</p><p id="total">In Stock: <?php echo @$_SESSION["amount2"]; ?></p></div></li>
                <li><div><button class="item-3" onclick="amount('3')"><p class="name" id="3">SeÑor Bub</p><p id="total">In Stock: <?php echo @$_SESSION["amount3"]; ?></p></div></li>
                <li><div><button class="item-4" onclick="amount('4')"><p class="name" id="4">Brew POP</p><p id="total">In Stock: <?php echo @$_SESSION["amount4"]; ?></p></div></li>
                <li><div><button class="item-5" onclick="amount('5')"><p class="name" id="5">Angelic lion</p><p id="total">In Stock: <?php echo @$_SESSION["amount5"]; ?></p></div></li>
                <li><div><button class="item-6" onclick="amount('6')"><p class="name" id="6">EPIC(Fruit Punch)</p><p id="total">In Stock: <?php echo @$_SESSION["amount6"]; ?></p></div></li>
                <li><div><button class="item-7" onclick="amount('7')"><p class="name" id="7">EPIC(Blue raspberry)</p><p id="total">In Stock: <?php echo @$_SESSION["amount7"]; ?></p></div></li>
                <li><div><button class="item-8" onclick="amount('8')"><p class="name" id="8">Rough Snake Zero</p><p id="total">In Stock: <?php echo @$_SESSION["amount8"]; ?></p></div></li>
                <li><div><button class="item-9" onclick="amount('9')"><p class="name" id="9">Oaken Five</p><p id="total">In Stock: <?php echo @$_SESSION["amount9"]; ?></p></div></li>
            </ul>
            <form class="catalog" action="additem.php" method="post">
                <input type="hidden" id="item-0" name="item-0">
                <input type="hidden" id="item-1" name="item-1">
                <input type="hidden" id="item-2" name="item-2">
                <input type="hidden" id="item-3" name="item-3">
                <input type="hidden" id="item-4" name="item-4">
                <input type="hidden" id="item-5" name="item-5">
                <input type="hidden" id="item-6" name="item-6">
                <input type="hidden" id="item-7" name="item-7">
                <input type="hidden" id="item-8" name="item-8">
                <input type="hidden" id="item-9" name="item-9">
            </form>
        </section>

        <script type="text/javascript">
            function amount(id){ //alerts the user of how much they want to buy
                var quantity = Number(prompt("How many "+document.getElementById(id).innerHTML+" would you like to add to your cart?"));
                if(isNaN(quantity)){
                    window.alert("please enter a proper amount that is a number");
                }else{
                    document.querySelector("#item-"+id).value = quantity;
                    document.querySelector(".catalog").submit();
                }
            }
            
        </script>
    </body>
</html>