<?php
    // Include config file
    session_start();
    require_once "../ff/php/conn.php";
    
    // Define variables and initialize with empty values

    $username= $_SESSION["username"];
    $ot=$_POST["dt"];
    $money=$_POST["mny"];
    $note=$_POST["nt"];

    if(empty($ot))
    {
        function_at("請先新增聯絡人");
        header("refresh:5;url=contact.php");
        exit;
    }

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $obj= "SELECT object FROM contacts WHERE nickname= '$ot' and username='$username'";
		$nn_to_un = mysqli_query($conn,$obj);
        foreach($nn_to_un as $row){
            $obj_un=$row['object'];
        }
            $sql="INSERT INTO record (debtor, creditor, money, notes, dt_state, ct_state)
                 VALUES('$username', '$obj_un', '$money', '$note', '已確認', '待確認')";
             
             if(mysqli_query($conn, $sql)){
                $nt="INSERT INTO notice (creater, to_user) VALUES('$username', '$obj_un')";
                mysqli_query($conn, $nt);
                 function_alert("新增成功");
                 header("refresh:5;url=record.php");
                 exit;
             }
             else{
                 echo "Error creating table: " . mysqli_error($conn);
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
        window.location.href='record.php';
        </script>";
        return false;
    } 
    function function_at($message) { 
        
        // Display the alert box  
        echo "<script>window.alert ('$message');
        window.location.href='contact.php';
        </script>";
        return false;
    }
?>