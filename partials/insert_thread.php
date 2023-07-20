<?php include '_dbconnect.php'; ?>



<?php

             $id=$_POST['id'];
             if($_SERVER["REQUEST_METHOD"] == "POST"){
                $threadtitle=$_POST['threadtitle'];
                $threaddesc=$_POST['threaddesc'];
                $threaddesc=str_replace("<","&lt",$threaddesc);
                $threaddesc=str_replace(">","&gt",$threaddesc);
                $username=$_POST['username'];

                $sql2="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `user_name`) VALUES ( '$threadtitle', '$threaddesc', '$id', '$username')";
                $result2=mysqli_query($conn,$sql2);
                session_start();
                $_SESSION['error']=true;

             }
             header('location:\PHP\forum\threadlist.php?id='.$id.'');
            ?>
            <!-- INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('$threadtitle', '$threaddesc', '$id', '0') -->