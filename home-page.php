<!-- 
Name(s): Trevor Crow, Cameron Foster
Date: 11/14/2018
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
        
        <!-- brief description about us and what we sell -->
        <section id="homedesc" class="col-8">
            <h1><img class="logo" src="images/soda.png" width="36px" height="36px">Welcome to Flooding Beverages,</h1>
            <article class="col-6">
                <p>
                    Flooding beverages is a company based in Georgia. Our name comes from two different things. Our story and the
                     taste of our beverages. Our Company was founded by two graduating college roommates who, right after graduation,
                      home flooded. They had business degrees and nowhere to go until they saw an ad that a soda company was looking for 
                      new owners to steer the ship back to the spotlight. So they rebranded the company made some new beverages and gave 
                      the company a new purpose. 10% of each purchase that you make goes to helping victims of natural disasters. Also 
                      our Soda is so that people who drink our product report their house flooding in the numerous flavors we provide.
                </p>
                <hr id="separator">
                <h2>Here's a list of Beverages we sell</h2>
                <ul>
                    <li>Rough Snake: our base cola</li>
                    <li>Lemon lager: a lemon lime kick</li>
                    <li>Passion fruit buzzer (kiwi java): don’t do the do, rather get buzzed with our citrus soda</li>
                    <li>SeÑor Bub: come we had to</li>
                    <li>Brew POP: this root beer is popping</li>
                    <li>Angelic lion: lemonade will make you feel heavenly</li>
                    <li>EPIC(Fruit Punch): A fruit punch power drink with a little extra dose of awesome</li>
                    <li>EPIC(Blue raspberry): A Blue rasberry power Drink with a little extra dose of awesome</li>
                    <li>Rough Snake Zero: base cola on a diet</li>
                    <li>Oaken Five: tea brewed five times to make it so great</li>
                </ul>
            </article>
        </section>
     </body>
 </html>