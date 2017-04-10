<!DOCTYPE html>
<!--Adobe Dreamweaver (Version CC) [Computer software]. (2016). San Jose, CA: Adobe Systems Incorporated.-->
<html lang="en">
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "group15database";
    $db = "coffee shop";

    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    }
    ?><head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Employee</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">

    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid"> 
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"> </li>
                        <li> </li>
                    </ul>
<ul class="nav navbar-nav navbar-right">
          <li> </li>
                        <?php
        if ($_SESSION['manager'] == NULL) {
            echo
				'<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Modify <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="modifypage.php">Recipe/Equiptment/Inventory</a> </li>
                            </ul>
                        </li>';
        }
        ?>
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse --> 
            </div>
            <!-- /.container-fluid --> 
        </nav>

        <!-- HEADER -->
        <header>
            <div class="jumbotron" id="banneremp">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="text-center" id="title1">Hi <?php echo $_SESSION[empName]; ?>,</h1>
                            <p class="text-center" style="color:white; text-shadow: 1px 1px 1px #685642;" >of <?php echo $_SESSION[empLocation]; ?> location</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- / HEADER --> 

        <!--  SECTION-1 -->
        <section>
          <div class="container ">
                <div class="row">
                    <div class="row" id="recipe">
                        <div class="col-lg-12 page-header text-center">
                            <h2 class="sub">Recipe</h2>
                        </div>
                    </div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
<?php
$sql =          "SELECT
                *
                FROM
                drink";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-lg-4 col-sm-12 text-center'> 
                        <h3>$row[Name]</h3>
                        <p>$row[Recipe]</p>
                    </div>";
    }
}
?>
                </div>
                <div>&nbsp;</div>
               <div class="row">
              <div class="row" id="schedban">
                  <div class="col-lg-12 page-header text-center">
                    <h2 class="sub">Schedule</h2>
                  </div>
                </div>
               			 
                			&nbsp
			<form id="form3" name="form3" method="post">
				<div class="row">
					<div class="col-lg-6">
						<div class="input-group"><span class="input-group-addon">
      <label>Add Time Availability</label>
      </span>
						
						</div>
						<!-- /input-group -->
<div class="input-group input-group-sm"><span class="input-group-addon">Date</span>
                  <input type="date" class="form-control" placeholder="small sized input group">
                </div>
                <div class="input-group input-group-sm"><span class="input-group-addon">Start Time</span>
                  <input type="time" class="form-control" placeholder="small sized input group">
                </div>
                <div class="input-group input-group-sm"><span class="input-group-addon">End Time</span>
                  <input type="time" class="form-control" placeholder="small sized input group">
                </div>
						&nbsp
						<div class="text-center">
							<button type="button" class="btn btn-primary">Submit</button>
						</div>
					</div>
					<!-- /.col-lg-6 -->
					<div class="col-lg-6">
						<div class="input-group"><span class="input-group-addon">
  	<label> Your Schedule</label></span>
						
						</div>
						<!-- /input-group -->
						<div></div>
					
						<div></div> 
						
						<div></div>
					
						<div></div> 
					
						&nbsp
						<div></div>
					
					</div>
			</form>
           </div>
       
               
<div>&nbsp;</div>
<div class="row" id="machine">
        <div class="col-lg-12 page-header text-center">
                        <h2 class="sub">Equiptment</h2>
      </div>
            </div>
                <div>&nbsp;</div>
                <div class="row">
                    
<?php
$sql =          "SELECT
                *
                FROM
                machinery
                WHERE
                Location = '$_SESSION[empLocation]'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-6 col-lg-6'>
                        <blockquote>
                            <p>$row[Name]</p>
                            <small>$row[Type] made in $row[ManufactureYear], located at $row[Location]</cite></small> </blockquote>
                    </div>";
    }
}
?>
                </div>
            <div>&nbsp;</div>
            <div class="row" id="inventory">
                  <div class="col-lg-12 page-header text-center">
                    <h2 class="sub">Inventory</h2>
                  </div>
                </div>
            <div>&nbsp;</div>

            </div>
          <div class="row">
            <div class="row">
              <?php
$sql =          "SELECT
                *
                FROM
                tea_leaves_coffee_beans
                WHERE
                InvenLocation = '$_SESSION[empLocation]'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-xs-6 col-lg-4'>
                        <h3>$row[InvenName]</h3>
                        <p> <i class='icon-desktop '></i>$row[Company]<br> Imported From: $row[ImportLocation]<br> Amount: $row[Amount]<br> Date of Manufacture: $row[DateOfManufacture]</p>";
        if($row[Amount] <= 5 && $_SESSION['manager'] == NULL){
                echo    "<p><a class='btn btn-default' href='http://www.bootstraptor.com'>Order More! »</a></p>";
        }
        echo "</div>";
    }
}
?>
            </div>
            <div>&nbsp;</div>
            <div class="row" id="sales">
              <div class="col-lg-12 page-header text-center">
                <h2 class="sub">Sales</h2>
              </div>
            </div>
            <div>&nbsp;</div>
            <div>
              <div class="input-group input-group-sm"><span class="input-group-addon">Date</span>
                <input type="date" class="form-control" >
              </div>
              <div class="input-group input-group-sm"><span class="input-group-addon">Drink</span>
                <input type="text" class="form-control" placeholder="Cofee/Tea">
               </div>
                <div class="input-group input-group-sm"><span class="input-group-addon">Customer's Email</span>
                <input type="email" class="form-control" placeholder="noname@exmample.com">
               </div>
            </div>
          </div>
           <div>&nbsp;</div>
           <div class="text-center">
			<button type="button" class="btn btn-primary">Add</button>
			</div>
           <div>&nbsp;</div>
            <!-- /container -->

            <!-- / CONTAINER--> 
        </section>
        <div class="well"> </div>

        <?php
        if ($_SESSION['manager'] == NULL) {
            echo
            "<!-- FOOTER -->
<div class='container'>
  <div class='row'>
    <div class='col-lg-offset-3 col-xs-12 col-lg-6'>
      <div class='jumbotron' id='signup'>
        <div class='row text-center'>
          <div class='text-center col-xs-12 col-sm-12 col-md-12 col-lg-12'>
            <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
            <h2>Add Employee</h2>
          </div>
          <div class='text-center col-lg-12'> 
            <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
            <form action='addEmployee.php' method='post' role='form' id='feedbackForm' class='text-center'>
              <div class='form-group'>
                <label for='name'>Name</label>
                <input type='text' class='form-control' id='name' name='name' placeholder='Name'>
                <span class='help-block' style='display: none;'>Please enter your name.</span></div>
              <div class='form-group'>
                <label for='sin'>SIN</label>
                <input type='text' class='form-control' id='sin' name='sin' placeholder='SIN'>
              </div>
               <div class='form-group'>
                <label for='name'>Password</label>
                <input type='password' class='form-control' id='password' name='newPassword' placeholder='Password'>
              </div>
               <div class='form-group'>
                <label for='name'>Confirm Password</label>
                <input type='password' class='form-control' id='confirmpassword' name='confirmation' placeholder='Confirm Password'>
              </div>
              <button type='submit' id='feedbackSubmit' class='btn btn-primary btn-lg' style=' margin-top: 10px;'> Send</button>
            </form>";
        }
        ?>
        <!-- END CONTACT FORM --> 
    </div>
</div>
</div>
</div>
</div>
</div>
<footer class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Copyright © MyWebsite. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- / FOOTER --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>
