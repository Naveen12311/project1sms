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
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body background="../img/wood.jpg">
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
            <form class="navbar-form navbar-right" action="search.php">
                <div class="form-group">
            <input type="search" name="search" placeholder="search" class="form-control">
                <input type="submit" name="search_submit" class="btn btn-primary btn-sm form-control">
                </div>
                    </form>
        </div>
    </nav>
         <?php
       
       include '../db/db.php';
          $query="SELECT id,name FROM logins WHERE usename='$_SESSION[usrname]'";
        $run=mysqli_query($conn,$query);
        while($sql=mysqli_fetch_assoc($run)){
        ?>
        <div style="height:10px; width:10px;"></div>
            <div class="jumbotron">
                <h2 class="text-center" style="font-family: sofia;"><span class="glyphicon glyphicon-star-empty"></span> Welcome <?php echo $sql['name']; ?> <span class="glyphicon glyphicon-star-empty"></span></h2>
       </div>
        <?php
        }
        ?>
        <img src="../img/nail.jpg" width="100%;">
    </body>
</html>