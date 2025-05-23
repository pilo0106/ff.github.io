<?php
    session_start();
    require_once "../ff/php/conn.php";

    $id=$_POST["hidden_id"];
    $username= $_SESSION["username"];

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $change = "UPDATE record SET `ct_state` = '已完成' WHERE id = '$id';";
        $cgresult=mysqli_query($conn,$change);
        if($cgresult){
        
            header("Location:en_record.php");
            exit;
        }
        else{
            function_alert('確認失敗，請聯絡管理員');
            header("refresh:32;url=en_record.php");
            exit;
        }
    }
    
    mysqli_close($conn);

    function function_alert($message) { 
         
        // Display the alert box  
        echo "<script>alert('$message');
         window.location.href='en_record.php';
        </script>"; 
        
        return false;
    } 
?>