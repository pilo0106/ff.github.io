<?php
    session_start();
    require_once "../ff/php/conn.php";

    $username=strtolower($_POST["account"]);
    $password=$_POST["pw"];
    $checkpassword=$_POST["checkpw"];
    $email=$_POST["mail"];

    $password_hash=password_hash($password,PASSWORD_DEFAULT);
    $checkpassword_hash=password_hash($checkpassword,PASSWORD_DEFAULT);

   if($_SERVER["REQUEST_METHOD"]=="POST"){

       //檢查帳號是否重複
       $checkacc="SELECT * FROM user WHERE account='$username'";

       if($username == $password){
        $_SESSION['msg'] = '帳號與密碼不得相同';
        header('Location: register.php');
        exit;
       }
       else if(mysqli_num_rows(mysqli_query($conn,$checkacc))==0){
            
            $sql="INSERT INTO user (account, password, mail)
                VALUES('$username', '$password', '$email')";
            
            if(mysqli_query($conn, $sql)){
                function_alert("註冊成功!");
                header("refresh:32;url=index.php");
                exit;
            }
            else{
                echo "Error creating table: " . mysqli_error($conn);
            }
        }
       else{
            $_SESSION['msg'] = '註冊失敗，該帳號已有人使用!';
            header('Location: register.php');
           //header("refresh:3;url=register.html",true);
           exit;
       }
   }
   
   mysqli_close($conn);
   
   function function_alert($message) { 
         
       // Display the alert box  
       echo "<script>alert('$message');
        window.location.href='index.php';
       </script>"; 
       
       return false;
   } 
?>