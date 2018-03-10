<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>

</style>
<body background="img/wood.jpg">
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed button-size" data-toggle="collapse" data-target="#navComponents" aria-expanded"false">
                  <i class="glyphicon glyphicon-align-justify glyphicon-align-center toggle-color"></i>
                  </button>
        <a class="navbar-brand" href="index.php">GLOWUP</a>
        </div>
         <div class="collapse navbar-collapse" id="navComponents">
        <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">HOME</a></li>
            
            <li><a href="req.php">Request</a></li>
            <li><a href="contactus.php">Conatct Us</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="login.php">Login/Sign-Up</a></li>
        </ul>
            
        </div>
    </nav>
    <div style="width:40px; height:40px;"></div>
    <div class="jumbotron">
         
    <h3 class="text-center">WE WOULD LOVE TO HERE FROM YOU</h3>
    </div>
    <div style="width:70px; height:70px;"></div>
    
    <div class="container">
        <div class="row">
              <?php
                 
                include 'db/db.php';
               
    if(isset($_POST['submitcont'])) 
    {
            $emailid=$_POST['emailid'];
            $phone=$_POST['phone']; 
            $message=$_POST['message'];
    $query="INSERT into contatct(emailid,phone,message) VALUES('$emailid','$phone','$message')";
    if($run_query=mysqli_query($conn,$query)){
        echo '<div class="alert alert-info">THANKS FOR CONTACTING US, WE ILL BE BACK SOON</div>';
    } else{
         echo '<div class="alert alert-info">SORRY! PLEASE TRY AGAIN</div>';
    }
    }
                ?>
<div class="col-sm-8">
    <div class="panel panel-default panel-success">
  <div class="panel-heading">
        <form class="form" action="contactus.php" method="post">
      <div class="form-group">
            <label for="Email-id">Email-id</label>
            <input type="email" class="form-control" id="Email-id" name="emailid" placeholder="enter email-id" required>
            </div>
            <div class="form-group">
             <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" pattern="^\d{4}\d{3}\d{3}$" placeholder="enter phone-no." required>
            </div>
            
             <div class="form-group">
             <label for="message">Message</label>
            <textarea class="form-control" id="message" cols="7" name="message" required></textarea>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-success" name="submitcont" value="Send Message" placeholder="Enter Your Message">
            </div>
      </form>
        </div>
        </div>
</div>
    </div>
    </div>
         
     <div style="width:60px; height:60px;"></div>
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