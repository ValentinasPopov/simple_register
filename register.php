<?php

    include("classes/User.php");
    $class_user = new User();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username) || empty($password))
    {
        echo "Tuscias Laukas";
    }
    else
    {
        if($class_user->find_username_register($username))
        {
            $class_user->register($username, $password);
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