
<?php

session_start();
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
        min-height: 90vh;
    }
    </style>
</head>

<body>
    <?php include 'partials\_header.php'; ?>

    <div class="container bg-dark my-4 text-light rounded-3 p-3" id="cc">
    <h2 class="py-2">Search results for "<?php echo $_GET['search']; ?> "</h2><hr>

                     <div class="container ">
                         <ul>
                   <?php
                       $search= $_GET['search'] ;
                        $sql="SELECT * FROM `threads` WHERE `thread_title` LIKE '%$search%'";
                        $result=mysqli_query($conn,$sql);
                       $noResult=true;
                        while($row=mysqli_fetch_assoc($result)){
                           echo '<li >
                          <p class="fw-bold mb-0">Asked by: '.$row['user_name'].'  at '.$row['date/time'].' </p>
                          <h3 >  <a href="threads.php?threadid='.$row['thread_id'].'" class="text-light">'. $row['thread_title'].' </a> </h3>
                           <p>'.$row['thread_desc'].'</p>
                           </li>';
                      $noResult=false;
                        }

                        if($noResult){
                            echo  ' <div class="h-100  text-white bg-dark rounded-3">
                            <div class="container">
                            <p class="display-6">No Result Found</p>
                            <p class="lead">Suggestions:<ul>
                            <li>Make sure that all words are spelled correctly</li>
                            <li>Try different keywords</li>
                            <li>Try more general keywords</li>
                            </ul>
                            </p>
                            
                            </div>
                            
                            
                            </div>';
            
                        }

?>




                    </ul>     </div>

 

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