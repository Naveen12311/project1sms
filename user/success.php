
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
        <li><a href="user.php">HOME</a></li>
             <li><a href="services.php">Services</a></li>
              <li><a class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="bookh.php">Booked Services</a></li>
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
        <div style="height:80px; width:80px;"></div>
       <?php
          include '../db/db.php';
          if(isset($_POST['submitconf'])){
              $name=$_POST['cname'];
              $service=$_POST['cservice'];
               $price=$_POST['cprice'];
              $mail=$_POST['cmail'];
              $mobile=$_POST['cmobile'];
              $slot=$_POST['cslot'];
          $query="INSERT INTO appointments(shop_name,service,price,mail,mobile,timeslot) VALUES('$name','$service','$price','$mail','$mobile','$slot')";
              mysqli_query($conn,$query);
              
          }
        ?> 
        <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-12">
        <div class="panel panel-default">
  <div class="panel-body"><center>
      <img src="../img/tick.gif" height="300px; width:400px;"></center><br>
            <h2 class="text-center">YOUR SERVICE HAS BEEN SUCCESSFUL BOOKED<br><br>ENJOY THE SERVICE!!</h2>
            </div>
</div>
            </div>
        </div>
</div>
    </body>
</html>