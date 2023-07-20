<?php include '_dbconnect.php'; ?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $useremail = $_POST['useremail'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
       $existsql="SELECT * FROM `users` WHERE `user_email` = '$useremail'";
       $result=mysqli_query($conn, $existsql);
       $numexist=mysqli_num_rows($result);

       if($numexist >0)
       {
           session_start();
         $_SESSION['showerror']="email already exist enter another email";
         header('location:'.$_SERVER['HTTP_REFERER'].'');
       }else
       {
            if($password==$cpassword)
            {
              $hash=password_hash($password, PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` ( `user_name`, `user_email`, `user_password`) VALUES ( '$username', '$useremail', '$hash')";
            $result = mysqli_query($conn, $sql);
            session_start();
            $_SESSION['showalert']="your account created susccesfully you can login now!!!";
            header('location:'.$_SERVER['HTTP_REFERER'].'');
            }else
            {
                session_start();

            $_SESSION['showerror']="password do not matched try again";
            header('location:'.$_SERVER['HTTP_REFERER'].'');
            }


       }


      


}
?>