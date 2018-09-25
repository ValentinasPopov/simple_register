
<?php

    session_start();

    if(isset($_SESSION['user_username']))
    {

        echo $_SESSION['user_username'];
    }
    else
    {
        header("Location: index.php");
    }