<?php include '_dbconnect.php'; ?>




<?php

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/PHP/forum">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/PHP/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>';

      
      $sql="SELECT * FROM `categories` ";
      $result= mysqli_query($conn,$sql);

           echo   '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Top Categories
                </a><ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

                while($row=mysqli_fetch_assoc($result))
        {
             $cat=$row['categories-name'];
             $desc=$row['categories_disc'];
             $catid=$row['categories_id']; 
   echo'<li><a class="dropdown-item" href="threadlist.php?id='.$catid.'">'.$cat.'</a></li>';
        }

            echo' </ul>
            </li>  <li class="nav-item">
        <a href="#" class="nav-link " data-bs-toggle="modal" data-bs-target="#contactmodal">Contact Us</a>
      </li>
    </ul>';

    
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
           echo  '<form action="search.php" method="GET" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search threads" name="search" aria-label="Search">
                <button class="btn  btn-success" type="submit">Search</button>
                </form> 
                <p class="text-light mx-2 mb-0" >welcome '. $_SESSION['username'].'
                <a href="partials\_logout.php" class="btn mx-2 btn-outline-success" >Logout</a> ';
     
    }else{

           echo '<form  action="search.php" method="GET"  class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search threads" name="search" aria-label="Search">
                <button class="btn  btn-success" type="submit">Search</button>
                </form>
                <button type="button" class="btn ms-2 btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
                <button type="button" class="btn mx-2 btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>';
        
    }
  
  
                echo '</div>
                  </div>
                  </nav>';


   include 'partials\_loginmodal.php';
   include 'partials\_signupmodal.php';
   include 'partials\_contactmodal.php';


?>