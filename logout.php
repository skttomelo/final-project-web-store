<!-- 
Name(s): Trevor Crow
Date: 12/3/2018
Description: destroys the current session so that the user is logged out of the site, after that it returns the user to the home page
-->
<?php
    session_start();
    session_destroy();

    ob_start();
    header('Location: home-page.php');
    ob_end_flush();
    die();
?>