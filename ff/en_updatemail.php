<?php
    // Include config file
    session_start();
    require_once "../ff/php/conn.php";
    
    // Define variables and initialize with empty values
    $username= $_SESSION["username"];
    $password=$_POST["pw"];
    $newmail=$_POST["mail"];

    //增加hash可以提高安全性
    $password_hash=password_hash($password,PASSWORD_DEFAULT);

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //檢測資料庫是否有對應的username和password的sql
        $checkpsw="SELECT password FROM user WHERE password='$password'";//++
        $sql = "SELECT `account`, `password` FROM `user` WHERE account ='$username' and password = '$password';";
        
        //執行sql
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==1){
            $change = "UPDATE user SET `mail` = '$newmail' WHERE account = '$username' and `password` = '{$password}';";
            $cgresult=mysqli_query($conn,$change);
            if($cgresult){
                function_alert('E-mail reset complete');
                header("refresh:32;url=en_user.php");
                exit;
            }
            else{
                function_alert('E-mail modification failed');
                header("refresh:32;url=en_user.php");
                exit;
            }
            
        }
        else if(mysqli_num_rows($result)==0 || mysqli_num_rows(mysqli_query($conn,$checkpsw))==0){
            function_alert('The modification failed, please confirm whether the password is entered correctly :(');  
            header("refresh:32;url=en_user.php");
            exit;
        }
        else{
            function_alert('Something went wrong, please contact the administrator QQ');  
            header("refresh:32;url=en_user.php");
            exit;
        }
    }
    else{
        function_alert("Something wrong"); 
    }

        // Close connection
        mysqli_close($link);

    function function_alert($message) { 
        
        // Display the alert box  
        echo "<script>window.alert ('$message');
        window.location.href='en_user.php';
        </script>";
        return false;
    } 
?>