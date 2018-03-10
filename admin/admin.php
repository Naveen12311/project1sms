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
    </head>
<body background="../img/wood.jpg">
    <nav class="navbar navbar-primary navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">WELCOME ADMIN</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php">HOME</a></li>
             <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Add<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="addadmins.php">Admin's</a></li>
          <li><a href="addsallon.php">Sallon's id</a></li>
         
                 </ul></li>
           <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">View<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="viewaduse.php">Admin's and users</a></li>
                    <li><a href="viewsallon.php">Sallon's id</a></li>
                    <li><a href="viewreq.php">Requested ID"S</a></li>
                    <li><a href="viewser.php">Services</a></li>
                    <li><a href="app.php">Appointments</a></li>
                    <li><a href="contact.php">Contacted Customers</a></li>
                </ul>
            </li> 
            
            <li><a href="../logout.php">Logout</a></li>
        </ul>
            
        </div>
    </nav>
        <div style="width:40px; height:40px;"></div>
    <img src="../img/madlogo2.png" height="250px;" width="1347px;">
    <div style="width:100px; height:100px;"></div>
    <div class="conatiner-fluid">
    </div>
    <div class="container">
    <div class="row">
        <div class="col-sm-11">
<div class="panel panel-primary">
    <div class="panel-heading">
        <center>
    <img src="../img/logo.png" class="img-thumbnail" width="300" height="336">
     </center>
        </div>
      <h2 class="text-center"> <font size="100px;" color="blue">WELCOME ADMIN</font> </h2>
    </div>
        </div>
       
    
    
        </div>
    </div>
    </body>
</html>