<?php
    session_start();
    require_once "../ff/php/conn.php";

    $username=strtolower($_POST["findid"]);
    $from= strtolower($_SESSION["username"]);

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        //檢查帳號是否存在
        $checkacc="SELECT account FROM user WHERE account='$username'";
        //檢查帳號是否已在清單
        $checkcon="SELECT * FROM contacts WHERE object='$username' and username='$from'";
 
        
       if(mysqli_num_rows(mysqli_query($conn,$checkcon))==1){
            function_alert("Already added this person :)");
            header("refresh:32;url=en_contact.php");
            exit;
       }
       else if($username == $from)
       {
            function_alert("Unable to add yourself as a friend");
            header("refresh:32;url=en_contact.php");
            exit;
       }
        else if(mysqli_num_rows(mysqli_query($conn,$checkacc))==1){
            
             $sql="INSERT INTO contacts (username, nickname, object)
                 VALUES('$from', '$username', '$username')";
             
             if(mysqli_query($conn, $sql)){
                 function_alert("Added successfully");
                 header("refresh:32;url=en_contact.php");
                 exit;
             }
             else{
                 echo "Error creating table: " . mysqli_error($conn);
             }
         }
        else{
             function_alert("No such an account");
             header("refresh:32;url=en_contact.php");
            //header("refresh:3;url=register.html",true);
            exit;
        }
    }
    
    mysqli_close($conn);

    function function_alert($message) { 
         
        // Display the alert box  
        echo "<script>alert('$message');
         window.location.href='en_contact.php';
        </script>"; 
        
        return false;
    } 
?>