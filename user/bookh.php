
<html>
<head>
    <?php
     session_start();
     $ser='localhost';
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
        <div class="jumbotron">
        <h2 class="text-center">YOUR RECETLY BOOKED SERVICES</h2>
        </div>
         <?php
       
        include '../db/db.php';
          $query="SELECT id,shop_name,service,price,mail,mobile,timeslot FROM appointments WHERE mail='$_SESSION[usrname]'";
        $run=mysqli_query($conn,$query);
        if(mysqli_num_rows($run) > 0){
        while($sql=mysqli_fetch_assoc($run)){
            
        
        ?>
        
        <div class="container">
            <div class="row">
                
                <div class="col-sm-8">
        <div class="panel-group">
    <div class="panel panel-default">
        
        <div class="panel-heading"><b>NAME :</b> <?php echo $sql['shop_name']; ?></div>
      <div class="panel-body"><b>PRICE :</b> <?php echo $sql['service']; ?><br>
        <b>LOCATION :</b> <?php echo $sql['price']; ?><br>
           <b>CATOGRIE :</b> <?php echo $sql['mail']; ?><br>
           <b>DESCRIPTION :</b> <?php echo $sql['mobile']; ?><br>
          <b>FOR :</b> <?php echo $sql['timeslot']; ?><br><br>
         <?php echo '<a href="bookh.php?del=' . $sql['id'] .'" class="btn btn-danger btn-xs">DELETE</a>' ?>
        </div>
       
    </div>
            
        </div>
            </div>
            </div>
            </div>
        <?php
        }}else{
             echo '<h3 class="text-center">NO SERVICES BOOKED YET!!<h3>';
        }
        ?>
         <?php
     include '../db/db.php';
    if(isset($_GET['del'])){
        
        $del=$_GET['del'];
        $query="DELETE FROM appointments WHERE id='$del'";
        $run=mysqli_query($conn,$query);
    }
    ?>
       
    </body>
</html>