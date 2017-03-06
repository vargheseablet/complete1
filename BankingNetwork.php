<!DOCTYPE html>
<html class="full" lang="en">
<head>
  <title>Network Banking</title>
  <meta charset="utf-8">
   <meta http-equip="X-UA-Compatable" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="http://localhost/NetworkBanking/media/css/login.css" rel="stylesheet">
  <script src="http://localhost/NetworkBanking/media/js/my_js.js"></script>

   

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    } 

   
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  

    .carousel-caption {
      border: 2px solid black;
      display: block;
      right:15%;
      left: 65% ;
      bottom: 45%;
      background-color: black;
      opacity: 10%;
      padding:10px;
    } 

  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <!--<li><a href="#">Profile</a></li>-->
        <li><a href="#">Contact</a></li>
      </ul> -->
      <ul class="nav navbar-nav navbar-right">
        <li></li>
         <li>
       
        <a href="#" onclick="div_create_show()"><span class="glyphicon glyphicon-user-add"></span>Create Account</a></li> 

        <li>
        <!-- <button id="lpopup"  onclick="div_show()"><span class="glyphicon glyphicon-log-in"></span> Login</button> -->
        <a href="#" onclick="div_login_show()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators" >
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="file:///C:/Users/Yashashree/Desktop/man-with-phone.jpg" alt="Image" style="width:100%;
          max-height: 600px !important;">
        <div class="carousel-caption">
          <h3>Network Banking!</h3>         
          <p>Access the Internet banking facility anyplace, anytime, and on any device!</p>
        </div>      
      </div>

      <div class="item">
       
        <img src="file:///C:/Users/Yashashree/Desktop/laptop.jpg" alt="Image" style="width:100%;
          max-height: 600px !important;">
        <div class="carousel-caption">
          
          <h3>Multiple accounts!</h3>
        <p>Access multiple accounts and perform basic bank transactions through a single portal.</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  



<div id="login">
    <!-- Popup Div Starts Here -->
    <div id="popupContact">
      <!-- Login Form -->
      <form name="myForm" action="<?php echo base_url()?>Bank/authenticate" method="POST">
        <img id="close" src="file:///C:/xampp/htdocs/NetworkBanking/media/images/close.png" width=22px height=22px onclick ="div_login_hide()">
        <h2> Login</h2>
        <hr>
        <table style="width:100%"  cellpadding="10" >
          <tr>
            <td><label >Email</label></td>
            <td><input name="email" type="text" placeholder="Email" size="" id="email" /></td>
          </tr>
          <tr>      
            <td><label >Password    </label></td>
            <td><input name="psw" type="password" placeholder="Password" id="password" /></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" value="Login" id="submit"/></td>
          </tr>
        </table>
      </form>      
    </div>
    <!-- Popup Div Ends Here -->
</div>


<div id="create">
    <!-- Popup Div Starts Here -->
    <div id="popupContact">
      <!-- Form Starts here -->
      <form name="create_form" method="POST" action="<?php echo base_url()?>Bank/insert_db" onsubmit="return(Submit())">   
       <!-- Form Description -->
        <img id="close" src="file:///C:/xampp/htdocs/NetworkBanking/media/images/close.png" width=22px height=22px onclick ="div_create_hide()">
        <h2> Create Account</h2>
        <hr>
        <table style="width:100%"  cellpadding="10px" >
          <tr>
            <td><label >Username</label></td>
            <td><input type="text" name="uname" placeholder="Username" class="uname"></td>
          </tr>
          <tr>
            <td><label >Email</label></td>
            <td><input type="email" name="email" placeholder="Email" id="email"></td>
          </tr>
          <tr>
            <td><label >Mobile Number</label></td>
            <td><input type="text" name="mob_no" maxlength="10" class="mobile" placeholder="Mobile no"></td>
          </tr>
          <tr>
            <td><label >Password</label></td>
            <td><input type="password" name="psw" id="password" placeholder="Password"></td>
          </tr>
          <br>
          <tr>
            <td colspan="2"><input type="submit" id="submit" value="Sign Up"></td>
          </tr>
        </table>
      </form>

      <!-- Form ends here -->
        </div>
    <!-- Popup Div Ends Here -->


    </div>


<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
