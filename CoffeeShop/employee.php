<!DOCTYPE html>
<!--Adobe Dreamweaver (Version CC) [Computer software]. (2016). San Jose, CA: Adobe Systems Incorporated.-->
<html lang="en">
<head>
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
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a> </li>
            <li><a href="#">Another action</a> </li>
            <li><a href="#">Something else here</a> </li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a> </li>
          </ul>
        </li>
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
          <?php session_start() ?>
          <h1 class="text-center" id="title1">Hi <?php echo $_SESSION[empName]; ?>,</h1>
          <p class="text-center" style="color:white" >of <?php echo $_SESSION[empLocation]; ?> location</p>
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
          <h2 class="sub">RECIPE</h2>
        </div>
      </div>
<div>&nbsp;</div>
<div>&nbsp;</div>
      <div class="col-lg-4 col-sm-12 text-center"> <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
        <h3>Lorem ipsum</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
        <h3>Lorem ipsum dolor</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
        <h3>Lorem ipsum dolor</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
        <h3>Lorem ipsum</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
        <h3>Lorem ipsum dolor</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/140X140.gif" data-holder-rendered="true">
        <h3>Lorem ipsum</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      </div>
      <div>&nbsp;</div>
    </div>
    <div class="row" id="machine">
      <div class="col-lg-12 page-header text-center">
        <h2 class="sub">EQUIPMENT</h2>
      </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
      <div class="col-6 col-lg-6">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <small>Someone famous in <cite title="Source Title">Source Title</cite></small> </blockquote>
      </div>
      <div class="col-6 col-lg-6">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <small>Someone famous in <cite title="Source Title">Source Title</cite></small> </blockquote>
      </div>
      <div class="col-6 col-lg-6">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <small>Someone famous in <cite title="Source Title">Source Title</cite></small> </blockquote>
      </div>
      <div class="col-6 col-lg-6">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <small>Someone famous in <cite title="Source Title">Source Title</cite></small> </blockquote>
      </div>
    </div>
    
  </div>
<!-- /container -->
  
  <div class="container">
    <div class="row" id="inventory">
      <div class="col-lg-12 page-header text-center">
        <h2 class="sub">INVENTORY</h2>
      </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
      <div class="col-xs-6 col-lg-4">
        <h3>Feature Description</h3>
        <p> <i class="icon-desktop "></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt impedit est voluptatem doloremque architecto corporis suscipit quidem ratione! Quis laborum nam optio dolorem doloremque ex nobis quibusdam ad quo dolores? </p>
        <p><a class="btn btn-default" href="http://www.bootstraptor.com">View details »</a></p>
      </div>
      <div class="col-xs-6 col-lg-4">
        <h3>Feature Description</h3>
        <p> <i class="icon-desktop "></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, illo, libero esse assumenda culpa consequatur exercitationem beatae odio praesentium nihil iste ipsum reiciendis pariatur. Recusandae, reiciendis quidem eaque aut ab. </p>
        <p><a class="btn btn-default" href="http://www.bootstraptor.com">View details »</a></p>
      </div>
      <div class="col-xs-6 col-lg-4">
        <h3>Feature Description</h3>
        <p> <i class="icon-desktop "></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, adipisci recusandae veniam laudantium distinctio temporibus eveniet dolorum earum iusto veritatis provident ducimus minima dolore quas vel omnis cumque voluptas quibusdam.</p>
        <p><a class="btn btn-default" href="http://www.bootstraptor.com">View details »</a></p>
      </div>
      <div class="col-xs-6 col-lg-4">
        <h3>Feature Description</h3>
        <p> <em class="icon-desktop "></em> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, earum rem nostrum provident repellat inventore laborum deleniti quas facere Quasi impedit autem qui cupiditate modi vero vitae dolorum nisi explicabo ea dolores animi. Inventore, omnis.</p>
        <p><a class="btn btn-default" href="http://www.bootstraptor.com">View details »</a></p>
      </div>
      <div class="col-xs-6 col-lg-4">
        <h3>Feature Description</h3>
        <p> <i class="icon-desktop "></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, iure, perspiciatis, ab ad quia animi esse repudiandae tempore quisquam dolorem sequi voluptatum qui fugiat. Quasi impedit autem qui cupiditate iusto?</p>
        <p><a class="btn btn-default" href="http://www.bootstraptor.com">View details »</a></p>
      </div>
      <div class="col-xs-6 col-lg-4">
        <h3>Feature Description</h3>
        <p> <i class="icon-desktop "></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, aut, hic laudantium reprehenderit sapiente nemo consequatur corrupti accusantium! Hic, non rerum nihil reprehenderit excepturi explicabo error tempore aliquam eveniet odit.</p>
        <p><a class="btn btn-default" href="http://www.bootstraptor.com">View details »</a></p>
      </div>
    </div>
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
