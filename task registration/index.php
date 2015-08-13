<?php 
    include dirname(__FILE__) . '/options.php';
    include dirname(__FILE__) . '/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Colibri</title>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/bootstrapValidator.css"/>
<!-- Font Awesome  -->
<link href="css/font-awesome.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<!--<script src="js/jquery.min.js"></script>-->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrapValidator.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="/"><i class="fa fa-sun-o"></i> Colibri</a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="invites.phtml">Invites</a></li>
        <li><a href="users.phtml">Users</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- Slider -->
<div class="header-banner"> 
  <script src="js/responsiveslides.min.js"></script> 
  <script>
			 $(function () {
			  $("#slider").responsiveSlides({
				auto: true,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				pager: true,
			  });
			 });
			 </script>
  <div class="container">
    <div class="slider">
      <div class="callbacks_container">
        <ul class="rslides" id="slider">
          <li> <img src="images/bnr1.jpg" alt="">
            <div class="caption">
              <h1>Professional Solutions<span>.</span></h1>
              <p>Lorem ipsum dolor sit amet, mea id noster everti. In eos prima necessitatibus, ad duo iudico facilis voluptatum.</p>
              <a href="services.html" class="btn">More Info</a> </div>
          </li>
          <li> <img src="images/bnr2.jpg" alt="">
            <div class="caption">
              <h1>Customized Solutions<span>.</span></h1>
              <p>Lorem ipsum dolor sit amet, mea id noster everti. In eos prima necessitatibus, ad duo iudico facilis voluptatum.</p>
              <a href="services.html" class="btn">More Info</a> </div>
          </li>
          <li> <img src="images/bnr3.jpg" alt="">
            <div class="caption">
              <h1>Creative Solutions<span>.</span></h1>
              <p>Lorem ipsum dolor sit amet, mea id noster everti. In eos prima necessitatibus, ad duo iudico facilis voluptatum.</p>
              <a href="services.html" class="btn">More Info</a> </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Welcome Section -->
<div id="section_header">
  <h2><span>Welcome</span> to our website!</h2>
</div>
<div id="welcome">
<div class="container">
    <div class="col-md-6"> <img class="img-responsive" src="images/about1.jpg" align=""> 
         <h3>About us</h3>
      <p>Lorem ipsum dolor sit amet, quo meis audire placerat eu, te eos porro veniam. An everti maiorum detracto mea. Eu eos dicam voluptaria, erant bonorum albucius et per, ei sapientem accommodare est. Saepe dolorum constituam ei vel. Te sit malorum ceteros repudiandae, ne tritani adipisci vis.</p>
      <p>Lorem ipsum dolor sit amet, quo meis audire placerat eu, te eos porro veniam. An everti maiorum detracto mea. Eu eos dicam voluptaria, erant bonorum albucius et per, ei sapientem accommodare est.</p>
      <a href="about.html" class="btn">More</a> 
    </div>
    <div class="col-md-6">
 
      <div class="register span6">
            <form id="defaultForm" method="post" action="ajax.php" class="form-horizontal">
                <h2>REGISTER TO <span class="red"><strong>Colibri</strong></span></h2>
                 <!-- This container will be shown after sending new message -->
                <div id="alertContainer" class="alert" style="display: none;"></div>

                <div class="form-group">
                        <label class="col-lg-3 control-label">Login</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="username"/>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" name="password" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Confirm Password</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" name="confirmPassword" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone Number</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="phoneNumber" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Country</label>
                    <div class="col-lg-8">
                        <select class="form-control" id="country" name="country" onchange="getval(this)">
                            <option selected="selected" value="none"></option>
                            <?php echo get_countries($db); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">City</label>
                    <div class="col-lg-8">
                        <select class="form-control" id="city" name="city" id="city"></select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-lg-3 control-label">Invite</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="invite" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary reg-btn" id="registerUser">REGISTER</button>
                        <button type="button" class="btn btn-info clear-btn" id="resetBtn">CLEAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- :modal -->
    <div id="myModalBox" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Регистрация</h4>
                </div>
                <div class="modal-body">
                    <p>Регистрация прошла успешно</p>
                </div>
            </div>
        </div>
    </div>
    <!-- :modal -->
</div>
<!-- Footer -->
<div id="footerwrap">
  <div class="container">
    <div class="row">
      <div class="col-md-8"> <span class="copyright">Copyright &copy; 2015 Your Website Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></span> </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li><a href="#"><i class="fa fa-twitter"></i></a> </li>
          <li><a href="#"><i class="fa fa-facebook"></i></a> </li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a> </li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php

$name = 'andrey';
$name1 = 'andrey';
var_dump($name1 == $name);