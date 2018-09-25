<?php

session_start();

    include("classes/User.php");
    $class_user = new User();

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(isset($_POST['submit_register']))
    {
        if($class_user->login($username, $password))
        {
            $class_user->url('index.php');
            
        }
        else
        {
           echo "nub";
        }
    }
     
        


?>

<form action="" method="post">

    <input type="text" name="username" >
    <input type="text" name="password" id="">
    <input type="submit" name="submit_register" value="submit">

</form>