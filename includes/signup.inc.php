<?php
    if(isset($_POST['submit'])){

        include_once 'dbh.inc.php';

       $first =mysqli_real_escape_string($conn, $_POST['first']);
       $last =mysqli_real_escape_string($conn, $_POST['last']);
       $email =mysqli_real_escape_string($conn, $_POST['email;']);
       $uid =mysqli_real_escape_string($conn, $_POST['uid']);
       $pwd =mysqli_real_escape_string($conn, $_POST['pwd']);
       
    //Error handlers
    //Check for empty fields
      if(empty($first) || empty($last) || empty($email) || empty($pwd)){
        header("Location: ../signup.php?signup=empty");   
        exit();
        }else{
           //check if input characters are valid
            if(!preg_match("/^[a-zA-z]*$", $first) || !preg_match("/^[a-zA-z]*$", $last)){
               header("Location: ../signup.php?signup=invalid");   
               exit(); 
            }else{
              //check if email is valid
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                 header("Location: ../signup.php?signup=email");
                 exit();
              }else{
                 $sql="SELECT * FROM users WHERE user_uid = '$uid'";
                 $result = mysqli_query($conn,$sql);
                 
              }
            }


        }

    }else{
    header("Location: ../signup.php");
    exit();
}








