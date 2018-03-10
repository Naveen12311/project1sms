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
          <form class="form" action="addsallon.php" method="POST">
      <div class="form-group">
            <label for="usrnames">email</label>
            <input type="email" class="form-control" id="usrnames" name="mails" placeholder="enter username" required>
            </div>
              <div class="form-group">
             <label for="passwords">password</label>
            <input type="text" class="form-control" id="passwords" name="passs" placeholder="enter password" required>
            </div>
             <div class="form-group">
             <label for="sallon">Sallon</label>
             <input type="text" class="form-control" id="sallon" name="sallon" value="sallon" readonly>
            </div>
               <div class="form-group">
             <label for="nams">Name</label>
             <input type="text" class="form-control" id="phone" name="nams" required>
            </div>
              <div class="form-group">
             <label for="phone">Phone</label>
             <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-default" name="submitad">
            </div>
      </form>
        </div>
    </div>
    </div>
      </div>
        </div>
   <?php
   include '../db/db.php';
    if(isset($_POST['submitad']))
    {
            $usrname=$_POST['mails'];
            $pass=$_POST['passs']; 
            $sallon=$_POST['sallon'];
         $nam=$_POST['nams'];
        $phone=$_POST['phone'];
    $query="INSERT into logins(usename,password,who,name,phone) VALUES('$usrname','$pass','$sallon','$nam','$phone')";
       
    if($run_query=mysqli_query($conn,$query)){
        echo '<div class="alert alert-info">ADDED SUCCESFULLY</div>';
    }else{
        echo '<div class="alert alert-danger">E-MAIL ALREADY EXSITS TRY ANOTHER E-MAIL</div>';
    }
        }
    ?>
    
    </body>
</html>