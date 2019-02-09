<!-- 
Name(s): Trevor Crow, Cameron Foster
Date: 11/15/2018
Description: Log in page of site
-->
<?php
    session_start();
?>

 <!DOCTYPE html>
 <html>
     <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="layout.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
        <link rel="stylesheet" type="text/css" href="LogSignUp.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
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

        <!-- signup form -->
        <form action="signup.php" method="post" class="col-6">
            <h2>Sign Up:</h2> 
            
            <div>
                <label for="fname">First Name:</label><br>
                <input type="text" placeholder="Enter First name" name="fname" required>
                <br>
				<label for="lname">Last Name:</label><br>
                <input type="text" placeholder="Enter Last name" name="lname" required>
                <br>
				<label for="email">Email:</label><br>
                <input type="text" placeholder="Enter Username" name="email" required>
                <br>
			    <label for="uname">Username:</label><br>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <br>
                <label for="psw">Password:</label><br>
                <input type="password" placeholder="Enter Password" name="psw" required>
                
                <?php
                    if(isset($_SESSION["registered"]) && !@$_SESSION["registered"]){
                        @$_SESSION["registered"] = !@$_SESSION["registered"];
                        echo "<br>
                        <p style='color:red;'><b><i><u>USERNAME already exists</u></i></b></p>";
                    }
                ?>

                <br>
                <p>Already have an account? <a href = "loginpage.php">Log in</a>.</p>
                <br>

                <button type="submit">Sign Up!</button>
            </div>
        </form>
    </body>            
</html>