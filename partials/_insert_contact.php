<?php include '_dbconnect.php'; 
session_start(); 
?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{  $useremail = $_POST['useremail'];
    $username = $_POST['username'];
    $number = $_POST['number'];
    $contactdesc = $_POST['contactdesc'];

     $sql="INSERT INTO `contact` (`contact_name`, `contact_email`, `contact_number`, `contact_desc`) VALUES ( '$username', '$useremail', '$number', '$contactdesc')";
     $result=mysqli_query($conn,$sql);
     $_SESSION['showalert']=" Your detail has been sended plz wait for our community respond";
}

header('location:'.$_SERVER['HTTP_REFERER'].'');

?>