<html>
<head>
    <?php
     session_start();
     include '../db/db.php';
         
        if(isset($_SESSION['usrname'])&& isset($_SESSION['password'])){
            $query="SELECT * FROM logins WHERE usename = '$_SESSION[usrname]' && password = '$_SESSION[password]'";
            $run=mysqli_query($conn,$query);
            while(mysqli_fetch_assoc($run) > 0){
                
            }
        }else{
            header('Location:../login.php');
        }
    ?>
    
    

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body background="../img/12.jpg">
    <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed button-size" data-toggle="collapse" data-target="#navComponents" aria-expanded"false">
                  <i class="glyphicon glyphicon-align-justify glyphicon-align-center toggle-color"></i>
                  </button>
        <a class="navbar-brand" href="index.php">GLOWUP</a>
        </div>
        <div class="collapse navbar-collapse" id="navComponents">
        <ul class="nav navbar-nav navbar-right">
        <li><a href="sallon.php">HOME</a></li>
             <li><a href="addservices.php">Add Services</a></li>
              <li><a class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="sprofile.php">Profile</a></li>
                    <li><a href="sviewser.php">My Services</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                    
                </ul>
            </li> 
         
        </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
            <input type="search" name="search" placeholder="search" class="form-control">
                <input type="submit" name="submit" class="btn btn-primary btn-sm form-control">
                </div>
                    </form>
        </div>
    </nav>
  
 
<html>
     
   <body>
       <div style="height:100px; width:100px;"></div>
       <div class="container">
      <div class="row">
           <div class="col-sm-4">
           <?php
     
   include '../db/db.php';
        
       if(isset($_POST['submitser'])){
           $name = strip_tags($_POST['nam']);
            $price = strip_tags($_POST['price']);
           $mail = strip_tags($_POST['mail']);
           $loc = strip_tags($_POST['loc']);
           $for = strip_tags($_POST['for']);
           $cat = strip_tags($_POST['cat']);
           $desc = strip_tags($_POST['desc']);
           if(isset($_FILES['image'])){
               $image_name = $_FILES['image']['name'];
               $image_tmp = $_FILES['image']['tmp_name'];
               $image_size = $_FILES['image']['size'];
               $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
               $image_path ='../img/'.$image_name;
               $image_db_path = $image_name;
               if($image_size < 1000000){
                   if($image_ext == 'jpg' || $image_ext == 'png'){
                    if(move_uploaded_file($image_tmp,$image_path)){
                        $sql = "INSERT INTO sallons (name,price,mail,loc,forwho,cat,des,img) VALUES('$name','$price','$mail','$loc','$for','$cat','$desc','$image_db_path')";
                        if(mysqli_query($conn,$sql)){
                            echo '<div class="alert alert-info">SUCCESSFULLY UPLOADED</div>';
                        }else{
                             echo '<div class="alert alert-danger">SORRY! TRY AGAIN LATER</div>';
                        }
                    }else{
                        echo '<div class="alert alert-danger">SORRY!</div>';
                    }
                   }else {
                       echo '<div class="alert alert-danger">SORRY! MAKE SURE ITS IMAGE</div>';
                   }
               }else{
                     echo '<div class="alert alert-danger">SORRY! CHECK THE SIZE OF IMAGE</div>';
               }
           }
       }
?>
         
      <form action="addservices.php" method="POST" enctype="multipart/form-data" class="form">
          <div class="form-group">
         <input type="file" name="image" class="btn btn-primary"/ required>
              </div>
           <div class="form-group">
               <label for="nam">Sallon Name:</label>
         <input type="text" name="nam" id="nam" class="form-control"/ required>
              </div>
           <div class="form-group">
               <label for="price">Price</label>
         <input type="text" name="price" id="price" class="form-control"/ required>
              </div>
           <div class="form-group">
                <label for="loc">Location:</label>
         <input type="text" name="loc" class="form-control"/ required>
              </div>
           <div class="form-group">
                <label for="for">For Whom:</label>
         <input type="text" name="for" id="for" class="form-control"/ required>
              </div>
          <div class="form-group">
          <label for="cat">Catogrie</label>
         <input type="text" name="cat" id="cat" class="form-control" / required>
              </div>
          <div class="form-group">
                <label for="mail">mail</label>
         <input type="text" name="mail" id="mail" class="form-control" value="<?php echo $_SESSION['usrname'];?>"/ readonly>
              </div>
          <div class="form-group">
                <label for="desc">Description:</label>
         <input type="text" name="desc" id="desc" class="form-control"/ required>
              </div>
         <input type="submit" class="btn btn-danger" name="submitser"/>
      </form>
      </div>
          </div>
           </div>
   </body>

</html>
    </body>
