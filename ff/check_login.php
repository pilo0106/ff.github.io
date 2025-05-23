<?php
    // Include config file
    session_start();
    require_once "../ff/php/conn.php";
    
    // Define variables and initialize with empty values
    $username=strtolower($_POST["un"]);
    $password=$_POST["pw"];

    //增加hash可以提高安全性
    $password_hash=password_hash($password,PASSWORD_DEFAULT);

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($username && $password){
            //檢測資料庫是否有對應的username和password的sql
            $checkacc="SELECT account FROM user WHERE account='$username'";
            $checkpsw="SELECT password FROM user WHERE password='$password'";//++
            $sql = "SELECT `account`, `password` FROM `user` WHERE account ='$username' and password = '$password'";
            
            //執行sql
            $result=mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)==1){
                
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                //這些是之後可以用到的變數
                $_SESSION["username"] = $username;
                header("location: main.php");
            }
            else if(mysqli_num_rows(mysqli_query($conn,$checkacc))==0){
                $_SESSION['msg'] = '登入失敗，帳號不存在 :(';  
                header('Location: index.php');
            }
            else if(mysqli_num_rows(mysqli_query($conn,$sql))==0){
                $_SESSION['msg'] = '登入失敗，請確認密碼是否正確 :(';  
                header('Location: index.php');
            }
            else{
                $_SESSION['msg'] = '出錯ㄌ，請聯絡管理員QQ';  
                header('Location: index.php');
            }
        }
        else{
            //function_alert('請輸入帳號或密碼'); 
            $_SESSION['msg'] = '請輸入帳號或密碼'; 
            header('Location: index.php');
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
        </script>";
        return false;
    } 
?>