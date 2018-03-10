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
        <a class="navbar-brand" href="index.php">VIEW REQUESTED SALLON ID"S</a>
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
        <div class="col-sm-8">
            <h4><font color="white">REQUESTED SALLON ID"S</font></h4>
          <table class="table table-hover">
    <thead>
      <tr>
          <th>Name</th>
          <th>Sallon Name</th>
        <th>email</th>
        <th>Phone</th>
          <th>Address</th>
          <th>Message</th>
        <th>DELETE</th>

      </tr>
    </thead>
    <tbody>
        <?php
        include '../db/db.php';
          $query="SELECT * FROM request";
          $run_query=mysqli_query($conn,$query);
          while($sql=mysqli_fetch_assoc($run_query)){
      echo '<tr>
        <td>'.$sql['emailid'].'</td>
        <td>'.$sql['phone'].'</td>
        <td>'.$sql['sallonname'].'         <td>'.$sql['name'].        '         <td>'.$sql['area'].   '         <td>'.$sql['message'].                 '</td><td><a href="viewreq.php?del='.$sql['id'].'" class="btn btn-danger btn-xs">DELETE</a></td>';

          }
        
        ?>
          </tbody>
  </table>

    <?php
    include '../db/db.php';
    if(isset($_GET['del'])){
        
        $del=$_GET['del'];
        $query="DELETE FROM request WHERE id='$del'";
        $run=mysqli_query($conn,$query);
    }
    ?>
    </body>
</html>