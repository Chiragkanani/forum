<?php
session_start();

?>





<?php include 'partials\_dbconnect.php';

?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Welcome to iDiscuss - Coding Forums</title>
    <style>
    #cc {
        min-height: 533px;
    }
    </style>
</head>

<body>
    <?php include 'partials\_header.php'; ?>
    <?php
       
       if(isset($_SESSION['error']))
       {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your thread has been added! Please wait for community to respond 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['error']);
       }
    ?>

<?php
       
       if(isset($_SESSION['showerror']))
       {
       echo '<div class="alert alert-danger m-0 alert-dismissible fade show" role="alert">
       <strong>Sorry!</strong> '.$_SESSION['showerror'].'
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
     unset($_SESSION['showerror']);
       }
    ?>


<?php
       
       if(isset($_SESSION['showalert']))
       {
       echo '<div class="alert alert-success m-0 alert-dismissible fade show" role="alert">
       <strong>Success!</strong> '.$_SESSION['showalert'].'
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
     unset($_SESSION['showalert']);
       }
    ?>


    <div class="container my-4">
        <?php
  $id=$_GET['id'];
$sql="SELECT * FROM `categories` WHERE `categories_id` =$id ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);


     echo  ' <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2>Welcome to '.$row['categories-name'].' forums</h2>
            <p>'.$row['categories_disc'].'</p>
            <hr>
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times. </p>
            <button class="btn btn-outline-success" type="button">Learn more </button>
        </div>';
?>
    </div>

    <div class="container my-3" id="cc">

        <div class="container bg-dark text-light rounded-3 p-3">
            <h2 class="py-2">Start a Discussion</h2>
            <hr>



            <?php   

if(  isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
    echo   '<form action="partials\insert_thread.php" method="post">
    <div class="mb-3">
        <label for="thread_title" class="form-label">Problem Title</label>
        <input type="text" class="form-control" id="thread_title"  name="threadtitle" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible </div>
    </div>
    <div class="mb-3">
        <label for="thread_desc" class="form-label">Ellaborate Your Concern</label>
        <textarea class="form-control" id="thread_desc" rows="3" name="threaddesc"></textarea>
    </div>
    <input type="text" class="form-control hidden" value='.$_GET['id'].' name="id" id="id" hidden >
    <input type="text" class="form-control hidden" value='.$_SESSION['username'].' name="username"  hidden >
    <button type="submit" class="btn btn-success">Submit</button>
</form>';
    
}else{

echo'<p> You are not logged in. Please login to be able to start a Discussion </p>';


}


        
?>

        </div>










        <div class="container bg-dark text-light rounded-3 p-3 my-3">

            <h2 class="py-2">Browse Questions</h2>
            <hr>

            <?php
          $id=$_GET['id'];
          $sql1="SELECT * FROM `threads` WHERE `thread_cat_id` = $id ";
          $result1=mysqli_query($conn,$sql1);
          $noResult=true;
          
          while($row1=mysqli_fetch_assoc($result1))
          {
              
              echo  '<div class="d-flex align-items-center my-2">
        <div class="flex-shrink-0">
        <img src="partials\image\download.jpg" width="60  px" alt="...">
        </div>
                          
        <div class="flex-grow-1 ms-3">
        <p class="fw-bold">Asked by: '.$row1['user_name'].'  at '.$row1['date/time'].' </p>
        <h5 class="mt-0 "><a href="threads.php?threadid='.$row1['thread_id'].'" class="text-light">'.$row1['thread_title'].'</a></h5>
        
        <p class="text-primary text-light">'.$row1['thread_desc'].'</p>
        
        </div>
        </div> <hr>';

        $noResult=false;
        
    }
                    
    if($noResult){
                        echo  ' <div class="h-100  text-white bg-dark rounded-3">
                        <div class="container">
                        <p class="display-4">No Threads Found</p>
                        
                        <p class="lead">Be the first person to ask a question </p>
                        </div>
                        
                        
                        </div>';
        
                    }
                    ?>


        </div>
    </div>


    <?php include 'partials\_footer.php' ; ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>