<html>
<head>
       <?php
     session_start();
     $ser='localhost';
          $usrname='root';
          $pass='';
          $db='services';
          $conn=mysqli_connect($ser,$usrname,$pass,$db);
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
    </head>
    <style>
        body{
            background-color: grey;
            
        }
    </style>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">ADD SALLON ID'S</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php">HOME</a></li>
            
             <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Add<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="addadmins.php">Admin's</a></li>
          <li><a href="addsallon.php">Sallon's id</a></li>
          <li><a href="addservices.php">Services</a></li>
            <li><a href="offer.php">Offers</a></li>
                 </ul></li>
           <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">View<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="viewaduse.php">Admin's and users</a></li>
          <li><a href="viewsallon.php">Sallon's id</a></li>
          <li><a href="viewser.php">Services</a></li>
            
              <li><a href="app.php">Appointments</a></li>
            
            <li><a href="contact.php">Contacted Customers</a></li>
                 </ul></li> 
            
            <li><a href="../logout.php">Logout</a></li>
        </ul>
            
        </div>
    </nav>
<div style="width:100px; height:100px;"></div>
    <div class="container">
    <div class="row"> 
          
        <div class="col-sm-6">
        <div class="panel panel-danger">
  <div class="panel-heading">
          <form action="offer.php" method="POST" enctype="multipart/form-data" class="form">
      <div class="form-group">
            <label for="name">sallon Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="enter sallon name" required>
            </div>
              <div class="form-group">
                <label for="mail">mail</label>
            <input type="text" class="form-control" id="mail" name="mail" value="<?php echo $_SESSION['usrname'];?>" required readonly>
            </div>
          <div class="form-group">
         <input type="file" name="image" class="btn btn-primary"/ required>
              </div>
            <div class="form-group">
            <input type="submit" class="btn btn-default" name="submitof">
            </div>
      </form>
        </div>
    </div>
    </div>
      </div>
        </div>
   
  <?php
     
     $ser='localhost';
          $usrname='root';
          $pass='';
          $db='services';
          $conn=mysqli_connect($ser,$usrname,$pass,$db);
       if(isset($_POST['submitof'])){
           $name = strip_tags($_POST['name']);
           $mail = strip_tags($_POST['mail']);
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
                        $sql = "INSERT INTO offers(sallonname,mail,img) VALUES('$name','$name','$image_db_path')";
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
    
    </body>
</html>