
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
        <?php
         include '../db/db.php';
          $id=$_GET['conf'];
          $query="SELECT id,name,cat,price,mail FROM sallons WHERE id='$id'";
          $run_query=mysqli_query($conn,$query);
          while($sql=mysqli_fetch_assoc($run_query))
          {
             
        ?>
        
         <div style="height:50px; width:50px;"></div>
       <div class="container">
           <h3 class="text-center">CONFIRM DETAILS</h3>
           <div style="height:20px; width:20px;"></div>
      <div class="row">
          <div class="col-sm-4"></div>
           <div class="col-sm-4">
        <form action="success.php" method="post">
           <div class="form-group">
               <label for="nam">Sallon Name:</label>
         <input type="text" name="cname" id="nam" class="form-control" value="<?php echo $sql['name'];?>" required readonly>
              </div>
             <div class="form-group">
          <label for="cservice">Service</label>
         <input type="text" name="cservice" id="cservice" class="form-control" value="<?php echo $sql['cat'];?>" required readonly>
              </div>
           <div class="form-group">
               <label for="cprice">Price</label>
         <input type="text" name="cprice" id="cprice" class="form-control" value="<?php echo $sql['price'];?>" required readonly>
              </div>
          <div class="form-group">
                <label for="cmail">mail</label>
         <input type="text" name="cmail" id="cmail" class="form-control" value="<?php echo $_SESSION['usrname'];?>"/ readonly>
              </div>
             <div class="form-group">
                <label for="cmobile">Mobile:</label>
         <input type="text" name="cmobile" id="cmobile" pattern="^\d{4}\d{3}\d{3}$" class="form-control" required>
              </div>
             <div class="form-group">
                <label for="cslot">Time-Slot</label>
         <input type="datetime-local" name="cslot" id="cslot" class="form-control" required>
              </div>
         <input type="submit" class="btn btn-danger" name="submitconf">
        </form>
          </div>
           </div>
        </div>
        <?php
          }
        ?>
    </body>
    
</html>