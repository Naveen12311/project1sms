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
            header('Location:login.php');
        }
    ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    <link rel="stylesheet" href="../css/demo.css">
	<link rel="stylesheet" href="../css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<style>
    .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 10px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 40px 56px 76px 0 rgba(0,0,0,0.2);
}


   
    .col-sm-3{
        position: fixed;
    }
  
    </style>
    <script>
   
    </script>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">GLOWUP</a>
        </div>
         <ul class="nav navbar-nav navbar-right">
        <li><a href="user.php">HOME</a></li>
             <li><a href="services.php">Services</a></li>
              <li><a class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="user/profile.php">Profile</a></li>
                    <li><a href="user/book.php">Booked Services</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                    
                </ul>
            </li> 
         
        </ul>
        </div>
    </nav>
    <div style="height:100px; width:100px;"></div>
        <?php
          include '../db/db.php';
          if(isset($_GET['search_submit'])){
             $query="SELECT * FROM sallons WHERE name LIKE '%$_GET[search]%' || price LIKE '%$_GET[search]%' || loc LIKE '%$_GET[search]%' || 
             forwho LIKE '%$_GET[search]%' || cat LIKE '%$_GET[search]%' || des LIKE '%$_GET[search]%'";
          $run_query=mysqli_query($conn,$query);
          while($sql=mysqli_fetch_assoc($run_query))
          {
      ?>
    <div class="container-fluid">
     <div class="row">
    
   
        <div class="col-sm-5">
    <div class="card">
 
  
          <img src="../img/<?php echo $sql['img'];?>" height="250" width="100%">
   
    <?php echo '<br><br>&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span> <b>NAME :</b>' .$sql['name'] .'<br>&nbsp;&nbsp;<span class="glyphicon glyphicon-tags"></span> <b>PRICE :</b>'. $sql['price'] .'<br>&nbsp;&nbsp;<span class="glyphicon glyphicon-th"></span> <b>TYPE : </b>' . $sql['cat'] . '<br>&nbsp;&nbsp;<span class="glyphicon glyphicon-th-list"></span> <b>DESCRIPTION :</b>' . $sql['des'] .'<br>&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker"></span> <b>LOCATION :</b>'. $sql['loc'] .'<br><br>&nbsp;&nbsp;<a href="confirm.php?conf='.$sql['id'].'" class="btn btn-success">BOOK</a><br><br>' ; ?>
        </div><br><br>
            </div>
       
      <?php  
              
}
}
   
?>
                                                                            
        
            </div>
            </div>
        </div>
         </div>
         </div>
         
    
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