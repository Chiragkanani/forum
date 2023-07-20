<?php include 'partials\_dbconnect.php'; 
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
        #cc{
            min-height: 533px;      
          }
          </style>
</head>

<body>
    <?php include 'partials\_header.php'; ?>

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






    <div id="carouselExampleFade" class="carousel  slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="partials\image\download(2).jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="partials\image\download(1).jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="partials\image\download(3).jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>











    <div class="container my-4" id="cc">
        <h2 class="text-center">iDiscuss - Browse Categories</h2>
        <div class="row my-4">

    <?php 
        $sql="SELECT * FROM `categories`";
        $result= mysqli_query($conn,$sql);

        $image=1;
        while($row=mysqli_fetch_assoc($result))
        {
             $cat=$row['categories-name'];
             $desc=$row['categories_disc'];
             $catid=$row['categories_id'];
            
               echo  ' <div class="col-md-3 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="partials\image\card'.$image.'.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$cat.'</h5>
                        <p class="card-text">'.substr($desc,0,90).'.....</p>
                        <a href="threadlist.php?id='.$catid.'" class="btn btn-primary">View threads</a>
                    </div>
                </div>
            </div>';
            $image += 1;
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

<!-- https://source.unsplash.com/1600x500/?programmer,apple -->