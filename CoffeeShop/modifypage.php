<!DOCTYPE html>
<!--Adobe Dreamweaver (Version CC) [Computer software]. (2016). San Jose, CA: Adobe Systems Incorporated.-->
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Agency Template</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="../jQueryAssets/jquery-1.11.1.min.js"></script>
        <script src="../jQueryAssets/jquery.ui-1.10.4.button.min.js"></script>
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
                    <ul class="nav navbar-nav">
                        <li class="active"> </li>
                        <li> </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li> </li>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Links<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="homePage.html">Log Out</a> </li>
                                <li><a href="employee.php" >Employee</a> </li>
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
            <div class="jumbotron" id="modbanner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="text-center" id="title1">Hi Manager,</h1>

                            <p class="text-center" style="color: #FFFFFF; text-shadow: 1px 1px 1px #685642;">of Location</p>
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
                <div class="row">
                    <div class="row" id="modrecipe">
                        <div class="col-lg-12 page-header text-center">
                            <h2 class="sub">Modify Recipe</h2>
                        </div>
                    </div>
                    <form action="addRemoveDrink.php" id="form1" name="form1" method="post">
                        <div class="text-center">
                            <div class="checkbox">
                                <label><input type="radio" name="AddOrUpdateOrRemove" value="Remove">Remove</label> &nbsp &nbsp &nbsp
                                <label><input type="radio" name="AddOrUpdateOrRemove" value="Add">Add</label> &nbsp &nbsp &nbsp
                                <label><input type="radio" name="AddOrUpdateOrRemove" value="Update">Update</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-group input-group-sm"><span class="input-group-addon">Name</span>
                                <input type="text" name="drinkName" class="form-control" placeholder="Product">
                            </div>
                            <div class="input-group input-group-sm"><span class="input-group-addon">Coffe/Tea</span>
                                <input type="text" name="drinkType" class="form-control" placeholder="Type">
                            </div>
                            <div class="input-group input-group-sm"><span class="input-group-addon">$</span>
                                <input type="number" name ="price" class="form-control" placeholder="Price">
                                <span class="input-group-addon">.00</span>
                            </div>
                            <div class="input-group"><span class="input-group-addon">Recipe</span>
                                <textarea class="form-control" name="recipe" rows="2" id="steps" placeholder="Steps"></textarea>
                            </div>
                        </div>
                        &nbsp
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <div>&nbsp;</div>
                </div>
                <div class="row" id="modman">
                    <div class="col-lg-12 page-header text-center">
                        <h2 class="sub">Modify Equipment</h2>
                    </div>
                </div>
                <form action="addRemoveMachinery.php" id="form2" name="form2" method="post">
                    <div class="text-center">
                        <div class="checkbox">
                            <label><input type="radio" name="AddOrRemove" value="Remove">Remove</label> &nbsp &nbsp &nbsp
                            <label><input type="radio" name="AddOrRemove" value="Add">Add</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-group input-group-sm"><span class="input-group-addon">Equipment Name</span>
                            <input type="text" name="machineName" class="form-control" placeholder="small sized input group">
                        </div>
                        <div class="input-group input-group-sm"><span class="input-group-addon">Type</span>
                            <input type="text" name="machineType" class="form-control" placeholder="small sized input group">
                        </div>
                        <div class="input-group input-group-sm"><span class="input-group-addon">Manufacture Year</span>
                            <input type="text" name="manufactureYear" class="form-control" placeholder="placeholder content">
                        </div>
                    </div>
                    &nbsp
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <div>&nbsp;</div>

            </div>
            <!-- /container -->

            <div class="container">
                <div class="row sub" id="addinven">
                    <div class="col-lg-12 page-header text-center">
                        <h2 class="sub">Add Inventory</h2>
                    </div>
                </div>
                &nbsp
                <form action="addShipmentTeaBeans.php" id="form3" name="form3" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group"><span class="input-group-addon">
                                    <label>Tea Leaves or Coffee Beans</label>
                                </span>

                            </div>
                            <!-- /input-group -->
                            <div class="input-group input-group-sm"><span class="input-group-addon">Amount</span>
                                <input type="text" name="amountToAdd" class="form-control" placeholder="placeholder content">
                            </div>
                            <div class="input-group input-group-sm"><span class="input-group-addon">Inventory Name</span>
                                <input type="text" name="ingreName" class="form-control" placeholder="Only for Tea Leaves / Coffee Beans">
                            </div>
                            <div class="input-group input-group-sm"><span class="input-group-addon">Company</span>
                                <input type="text" name="company" class="form-control" placeholder="placeholder content">
                            </div>
                            &nbsp
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.col-lg-6 -->
                        <form action="addShipmentCondiments.php" id="form3" name="form3" method="post">

                            <div class="col-lg-6">
                                <div class="input-group"><span class="input-group-addon">
                                        <label>Condiments</label></span>

                                </div>
                                <!-- /input-group -->
                                <div class="input-group input-group-sm"><span class="input-group-addon">Amount</span>
                                    <input name="amountToAdd" type="text" class="form-control" placeholder="placeholder content">
                                </div>
                                <div class="input-group input-group-sm"><span class="input-group-addon">Condiment Name</span>
                                    <input name="condName" type="text" class="form-control" placeholder="placeholder content">
                                </div>
                                <div class="input-group input-group-sm"><span class="input-group-addon">Company</span>
                                    <input name="company" type="text" class="form-control" placeholder="placeholder content">
                                </div>
                                &nbsp
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
            </div>
            <!-- /container -->

            <div class="container">
                &nbsp

                <div class="row sub" id="removeemp">
                    <div class="col-lg-12 page-header text-center">
                        <h2 class="sub">Remove Employee</h2>
                    </div>
                </div>
                &nbsp
                <form action="removeEmployee.php" id="form4" name="form4" method="post">
                    <div>
                        <div class="input-group input-group-sm"><span class="input-group-addon">SIN</span>
                            <input name="sin" type="text" class="form-control" placeholder="Employee's SIN">
                        </div>
                    </div>
                    &nbsp
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- / CONTAINER-->
        </section>
        <div>&nbsp;</div>
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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.3.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
    </body>

</html>
