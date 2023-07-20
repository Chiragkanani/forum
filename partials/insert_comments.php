<?php include '_dbconnect.php'; ?>



<?php

           
             if($_SERVER["REQUEST_METHOD"] == "POST"){
                $comments=$_POST['comments'];
                $comments=str_replace("<","&lt",$comments);
                $comments=str_replace(">","&gt",$comments);
                $id=$_POST['threadid'];
                $username=$_POST['username'];

                $sql2="INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`) VALUES ( '$comments', '$id', '$username')";
                $result2=mysqli_query($conn,$sql2);
                session_start();
                $_SESSION['error2']=true;


             }
             header('location:\PHP\forum\threads.php?threadid='.$id.'');
            ?>