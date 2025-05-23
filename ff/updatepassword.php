<?php
    // Include config file
    session_start();
    require_once "../ff/php/conn.php";
    
    // Define variables and initialize with empty values
    $username= $_SESSION["username"];
    $password=$_POST["pw"];
    $newpassword=$_POST["newpw"];

    //增加hash可以提高安全性
    $password_hash=password_hash($password,PASSWORD_DEFAULT);
    $password_hash=password_hash($newpassword,PASSWORD_DEFAULT);

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //檢測資料庫是否有對應的username和password的sql
        $checkpsw="SELECT password FROM user WHERE password='$password'";//++
        $sql = "SELECT `account`, `password` FROM `user` WHERE account ='$username' and password = '$password';";
        
        //執行sql
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==1){
            $change = "UPDATE user SET `password` = '$newpassword' WHERE account = '$username' and `password` = '{$password}';";
            $cgresult=mysqli_query($conn,$change);
            if($cgresult){
                function_alert('密碼修改成功');
                header("refresh:32;url=user.php");
                exit;
            }
            else{
                function_alert('密碼修改失敗');
                header("refresh:32;url=user.php");
                exit;
            }
            
        }
        else if(mysqli_num_rows($result)==0 || mysqli_num_rows(mysqli_query($conn,$checkpsw))==0){
            function_alert('修改失敗，請確認舊密碼是否輸入正確 :(');  
            header("refresh:32;url=user.php");
            exit;
        }
        else{
            function_alert('出錯ㄌ，請聯絡管理員QQ');  
            header("refresh:32;url=user.php");
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
        window.location.href='user.php';
        </script>";
        return false;
    } 
?>