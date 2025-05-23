<?php
    session_start();
    require_once "../ff/php/conn.php";

    $id=$_POST["hidden_id"];
    $username= $_SESSION["username"];

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $change = "UPDATE record SET `dt_state` = '未還', `ct_state` = '未還' WHERE id = '$id';";
        $cgresult=mysqli_query($conn,$change);
        if($cgresult){
            header("Location:record.php");
            exit;
        }
        else{
            function_alert('確認失敗，請聯絡管理員');
            header("refresh:32;url=record.php");
            exit;
        }
    }
    
    mysqli_close($conn);

    function function_alert($message) { 
         
        // Display the alert box  
        echo "<script>alert('$message');
         window.location.href='record.php';
        </script>"; 
        
        return false;
    } 
?>