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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
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
        
         <?php
       
          $ser='localhost';
          $usrname='root';
          $pass='';
          $db='services';
          $conn=mysqli_connect($ser,$usrname,$pass,$db);
          $query="SELECT id,name,price,loc,forwho,cat,des,img FROM sallons WHERE mail='$_SESSION[usrname]'";
        $run=mysqli_query($conn,$query);
        while($sql=mysqli_fetch_assoc($run)){
            
        
        ?>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
        <div class="panel-group">
    <div class="panel panel-default">
        
        <div class="panel-heading"><b>NAME :</b> <?php echo $sql['name']; ?></div>
      <div class="panel-body"> <img src="../img/<?php echo $sql['img'];?>" height="150" width="219">
          <br><b>PRICE :</b> <?php echo $sql['price']; ?><br>
        <b>LOCATION :</b> <?php echo $sql['loc']; ?><br>
           <b>CATOGRIE :</b> <?php echo $sql['cat']; ?><br>
           <b>DESCRIPTION :</b> <?php echo $sql['des']; ?><br>
          <b>FOR :</b> <?php echo $sql['forwho']; ?><br><br>
         <?php echo '<a href="sviewser.php?del=' . $sql['id'] .'" class="btn btn-danger btn-xs">DELETE</a>' ?>
        </div>
       
    </div>
            
        </div>
            </div>
            </div>
            </div>
        <?php
        }
        ?>
       
          <?php
     $ser='localhost';
          $usrname='root';
          $pass='';
          $db='services';
          $conn=mysqli_connect($ser,$usrname,$pass,$db);
    if(isset($_GET['del'])){
        
        $del=$_GET['del'];
        $query="DELETE FROM sallons WHERE id='$del'";
        $run=mysqli_query($conn,$query);
    }
    ?>
    </body>
</html>