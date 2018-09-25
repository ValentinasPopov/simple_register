
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mano_project";

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

class User
{

    //Register
    function register($username, $password)
    {
        global $db;
        $stmt =  $db->prepare("INSERT INTO User  (username, password)  VALUES (:username, :password)");
        $stmt->execute(array(':username' => $username, ':password' => $password));
    }

    function find_username_register($username)
    {
        global $db;
        $stmt = $db->prepare("SELECT username FROM user WHERE username=:username");
        $stmt->execute(array('username' => $username));
        if($stmt->rowCount() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    //Login

    function login($username, $password)
    {
        // global $db;
        // $stmt = $db->prepare('SELECT id, username, password FROM user WHERE (username= :username AND password= :password)');
        // $stmt->execute(array(':username' => $username, ':password' => $password));
        // $count = $stmt->rowCount();
        // $results = $stmt->fetch();
        // if($stmt->rowCount() == 1 ){
        //     $_SESSION['username'] = $username;
        //     echo "<script>window.location = 'index.php'</script>";
        // }else{
        //     $errMsg = "Gebruiker en/of wachtwoord niet gevonden";
        // }

        global $db;
        $stmt = $db->prepare("SELECT username,password FROM user WHERE username =:username AND password =:password");
        // $stmt ->bindParam(':username',$username);
        // $stmt ->bindParam(':password', $password);
        $stmt->execute(array(':username' => $username, ':password' => $password ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0 ){
            $_SESSION['user_id'] = $results['id'];
            $_SESSION['user_username']= $username;
            $_SESSION['user_password']= $password;

            echo "<script>window.location = 'index.php'</script>";
            return true;
        }else{
            return false;
        }
    }

    

    function url($url)
    {
        header("Location: $url");
    }
    
}