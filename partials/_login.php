<?php include '_dbconnect.php'; ?>

<?php



if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $useremail = $_POST['email'];
  $password = $_POST['password'];

          $sql="SELECT * FROM `users` WHERE `user_email` = '$useremail' ";
          $result = mysqli_query($conn, $sql);
          $num=mysqli_num_rows($result);
          if($num>0)
          {

          
                  $row=mysqli_fetch_assoc($result);
                  $username=$row['user_name'];
                  if(password_verify($password,$row['user_password'] ))
                  {
                      session_start();
                      $_SESSION['showalert']="you are successfully logged in now you can enjoy our threads";
                      $_SESSION['username']="$username";
                      $_SESSION['loggedin']=true;

                    }else{
                        session_start();
                        $_SESSION['showerror']="your password is wrong try again!!";
                  }
           }else{
            session_start();
            $_SESSION['showerror']="Account not found plz signup!!";
           }
}
header('location:'.$_SERVER['HTTP_REFERER'].'');

?>