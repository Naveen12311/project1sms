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
 <link rel="stylesheet" href="../css/demo.css">
  <link rel="stylesheet" href="../css/footer-distributed-with-address-and-phones.css">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">   
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
       
        include '../db/db.php';
        
          $query="SELECT id,name FROM logins WHERE usename='$_SESSION[usrname]'";
        $run=mysqli_query($conn,$query);
        while($sql=mysqli_fetch_assoc($run)){
            
        
        ?>
        <div style="height:10px; width:10px;"></div>
            <div class="jumbotron">
                <h2 class="text-center" style="font-family: 'Sofia';"><span class="glyphicon glyphicon-star-empty"></span> Welcome <?php echo $sql['name']; ?> <span class="glyphicon glyphicon-star-empty"></span></h2>
       </div>
        <?php
        }
        ?>
    <img src="../img/nail.jpg" width="100%">
    <footer class="footer-distributed">

      <div class="footer-left">

        <h3>GLOW<span>UP</span></h3>

        <p class="footer-links">
          <a href="#">Home</a>
          ·
          <a href="#">Blog</a>
          ·
          <a href="#">Pricing</a>
          ·
          <a href="#">About</a>
          ·
          <a href="#">Faq</a>
          ·
          <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">GLOW UP &copy; 2017</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>LOVELY PROFFESIONAL UNIVERSITY</span>JALANDHAR,PUNJAB</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>236542366753</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@company.com">support@glowup.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
          WE ARE HERE TO MAKE THE WORLD A BETTER PLACE IN BEAUTY WORLD
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-github"></i></a>

        </div>

      </div>

    </footer>

    </body>
</html>