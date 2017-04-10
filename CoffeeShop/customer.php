<!DOCTYPE html>
<!--Adobe Dreamweaver (Version CC) [Computer software]. (2016). San Jose, CA: Adobe Systems Incorporated.-->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Customer</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
</div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="homePage.html">Log Out</a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<!-- HEADER -->
<header>
            <div class="jumbotron" id="bannerc">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                              <?php session_start() ?>
         					 <h1 class="text-center" id="title1">Hi <?php echo $_SESSION[custName]; ?>! </h1>
                        </div>
                    </div>
                </div>
            </div>
</header>
<!-- / HEADER --> 

<!--  SECTION-1 -->
<section>
  <div class="row"> </div>
  <div class="container ">
<div class="row" id="purchaseh">
      <div class="col-lg-12 page-header text-center">
        <h2 class="sub">Purchase History</h2>
      </div>
    </div>
<div>&nbsp;</div>
    <div class="row">
        <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "group15database";
        $db = "coffee shop"; 
        
        $conn = new mysqli($servername, $username, $password, $db);
        if ($conn->connect_error){
            die("Connection failed".$conn->connect_error);
        }
        $sql = "SELECT
                *
                FROM
                sales
                WHERE
                CustomerInfo = '$_SESSION[custEmail]'
                ORDER BY
                Date";            
        $result = $conn->query($sql);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<div class='col-6 col-lg-6'>
                        <blockquote>
                          <h3>$row[Drink]</h3>
                            <small>$row[Location] on $row[Date]</small></blockquote>
                     </div>";
            
            }
        }
        
        ?>
    </div>
    <div>&nbsp;</div>
    
  </div>
<!-- /container -->
  
  <div class="container">
    <div class="row" id="rrewards">
      <div class="col-lg-12 page-header text-center">
        <?php session_start() ?>
        <h2 class="sub" id="title3">You Have <?php echo $_SESSION[points];?> Bittersweet Points</h2>
      </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        
        <?php 
        session_start();
        $sql = "SELECT
                *
                FROM
                rewards
                WHERE
                PointCost <= $_SESSION[points]";
        
        $result = $conn->query($sql);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<div class='col-xs-6 col-lg-4'>
                        <h3>$row[Type]</h3>
                        <p> <i class='icon-desktop '></i>$row[PointCost] Points</p>
                        <p>
                        <form action = 'redeemReward.php' method='post'>
                        <button class='btn btn-default' name='reward' value='$row[Type]'>Redeem!</button>
                        </form>
                        </p>
                      </div>";
            
            }
        }
        ?>
    </div>
    <div>&nbsp;</div>
    <div class="row" id="redeemh">
      <div class="col-lg-12 page-header text-center">
        <h2 class="sub">Redeemed History</h2>
      </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
    <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "group15database";
        $db = "coffee shop"; 
        
        $conn = new mysqli($servername, $username, $password, $db);
        if ($conn->connect_error){
            die("Connection failed".$conn->connect_error);
        }
        $sql = "SELECT
                *
                FROM
                redeemed_rewards
                WHERE
                CustomerEmail = '$_SESSION[custEmail]'";            
        $result = $conn->query($sql);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<div class='col-6 col-lg-6'>
                        <blockquote>
                          <h3>$row[RewardType]</h3>
                        </blockquote>
                     </div>";
            
            }
        }
        
        ?>
    </div>
    <div>&nbsp;</div>
  </div>
  <!-- / CONTAINER--> 
</section>
<div class="well"> </div>

<!-- FOOTER -->
<div class="container">
  <div class="row">
    <div class="col-lg-offset-3 col-xs-12 col-lg-6"> </div>
  </div>
</div>
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
      </div>
    </div>
  </div>
</footer>
<!-- / FOOTER --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>
