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
    <div style="height:80px; width:80px;"></div>
 <?php 
    session_start();
	include 'db/db.php';
	if(isset($_POST['submit'])){
			$emailid = mysqli_real_escape_string($conn,@$_POST['emailidl']);
			$password = mysqli_real_escape_string($conn,@$_POST['passwordl']);
			$sql = "SELECT * FROM logins WHERE usename = '$emailid' and password='$password'";

            if($result = mysqli_query($conn,$sql)){
           
			
				while($rows = mysqli_fetch_assoc($result)){
					if(mysqli_num_rows($result) == 1){
						$_SESSION['usrname'] = $emailid;
						$_SESSION['password'] = $password;
                        $who = $rows['who'];
                        if($who == 'admin'){
						header('Location:admin/admin.php');
					} elseif($who == 'user')
                        {
                           header('Location:user/user.php'); 
                        }
                        elseif($who == sallon){
                            
                            header('Location:sallon/sallon.php');
                        }
				}else{
                      	   echo '<div class="alert alert-danger">WRONG CREDIANTIALS</div>';
                    }
				
			
            
		 
		
	}
    }else{
         echo '<div class="alert alert-danger">WRONG CREDIANTIALS</div>';
     
                    }
        
    }
?>

   
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
    
    <div class="jumbotron">
        <h3 class="text-center" style="color: green;">Login/Sign-Up</h3>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-sm-5">
            <?php
    include 'db/db.php';
    if(isset($_POST['name'])  
        &&isset($_POST['emailidr'])
        &&isset($_POST['passwordr'])
        &&isset($_POST['user'])) 
    {
        $name=strip_tags($_POST['name']);    
        $email_id=strip_tags($_POST['emailidr']);
        $password=strip_tags($_POST['passwordr']);
        $user=strip_tags($_POST['user']); 
        $phone=strip_tags($_POST['phone']); 
    $query="INSERT into logins(usename,password,who,name,phone) VALUES('$email_id','$password','$user','$name','$phone')";
      
    if($run_query=mysqli_query($conn,$query)){
          echo '<div class="alert alert-info">ACCOUNT SUCCESSFULLY CREATED</div>';
    }else{
         echo '<div class="alert alert-danger">EMAIL-ID ALREADY EXISTS PLEASE LOGIN</div>';
    }
        }
    ?>
    <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home" style="color: green;">Login</a></li>
  <li><a data-toggle="tab" href="#menu1" style="color: green;">Sign-Up</a></li>

</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="panel panel-default panel-success">
  <div class="panel-heading">
        <form class="form" action="login.php" method="post">
      <div class="form-group">
            <label for="Email-id">Email-id</label>
            <input type="email" class="form-control" id="Email-id" name="emailidl" placeholder="enter email-id" required>
            </div>
            <div class="form-group">
             <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="passwordl" placeholder="enter password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" name="submit">
                           

            </div>
            
      </form>
        
        </div>
</div>
  </div>
        
  <div id="menu1" class="tab-pane fade">
   <div id="home" class="tab-pane fade in active">
    <div class="panel panel-default panel-success">
  <div class="panel-heading">
        <form class="form" action="#" method="post">
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="enter Name" required>
            </div>
      <div class="form-group">
            <label for="Email-id">Email-id</label>
            <input type="email" class="form-control" id="Email-id" name="emailidr" placeholder="enter email-id" required>
            </div>
            <div class="form-group">
             <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="passwordr" placeholder="enter password" required>
            </div>
            <div class="form-group">
             <label for="phone">Phone</label>
            <input type="text" for="phone" class="form-control" id="phone" name="phone" pattern="^\d{4}\d{3}\d{3}$" required>
                 
            </div>
            <div class="form-group">
             <label for="user">enter user</label>
            <input type="text" class="form-control" id="user" name="user" value="user" readonly>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-default" name="submit">
            </div>
      </form>
        
        </div>
</div>
  </div>
  
</div>
    
    
 
   
        </div>
    </div>
    </div>
    </div>
     <div style="height: 30px; width: 30px;"></div>
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