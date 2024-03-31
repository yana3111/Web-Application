<!DOCTYPE html>
<html>
<head>
    <title>Booklyn</title>
    <meta name="viewport" content = "width = 	device-width" initial-scale = 1>

  	<link rel="stylesheet" href="../css/bootstrap.min.css" >
  	<script src = "../library/jquery-3.3.1.min.js"></script>
  	<!--<script src ="js/bootstrap.js"></script>		This create hinderence in dropdown -->

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" >
    
    <link  rel = "stylesheet" type = "text/css" href ="../css/login.css">
</head>

<body>
    <!-- navigation start -->
  <nav class = "navbar navbar-inverse" data-spy = "affix" data-offset-top = "80">
    <div class = "container-fluid">
      <div class = "navbar-header">
          <ul class = "nav navbar-nav">
              <li><a href = "#" class = "navbar-brand"><img src = "C:\Users\acer\OneDrive\AdvanceWeb3.0\BooklynBookReview\image\logo.jpeg"></a></li>
          </ul>
          <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#myNavbar">
              <span class = 	"icon-bar"></span>
              <span class = "icon-bar"></span>
              <span class = "icon-bar"></span>
          </button>
      </div>

      <div class = "collapse navbar-collapse" id = "myNavbar">
          <ul class = "nav navbar-nav">
            <li><a href = "index.php">Home</a></li>
            <li><a href = "myList.php">Mylist</a></li>
            <li><a href = "genre.php">Genre</a></li>
            <li><a href = "profile.php">Profile</a></li>
          </ul>
          <ul class = "nav navbar-nav navbar-right">
            <li><a href = "signUp.php"></spna class = "glyphicon glyphicon-user"></span>&nbsp SignUp</a></li>
            <li><a href = "login.php"></span class = "glyphicon glyphicon-log-in"></span>  &nbspLogin</a></li>
          </ul>
      </div>
    </div>
  </nav>

 <!-- navigation part end -->
   <!-- login form -->
   <div class = "container">
    <div class = "jumbotron text-center heading">
       <h1>Login</h1>
    </div>
    <br>
    <form class = "form-horizontal" action = "">
       <div class = "form-group has-feedback">
          <label for = "email" class = "control-label col-sm-offset-1 col-sm-2">Email:</label>
          <div class = "col-sm-6 email">
             <input type = "email" class = "form-control" name = "email" id = "email" placeholder = "Enter Email">
             <span class = "glyphicon gly_em form-control-feedback"></span>
          </div>
       </div>
       <br>
       <div class = "form-group has-feedback">
          <label for = "password" class = "control-label col-sm-offset-1 col-sm-2">Password:</label>
          <div class = "col-sm-6 pwd">
             <input type = "password" class = "form-control" name = "pwd" id = "pwd" placeholder = "Enter password">
             <span class = "glyphicon gly_pwd form-control-feedback"></span>
          </div>
       </div>
       <div class = "form-group">
          <div class = "col-sm-offset-3 col-sm-9">
             <div class = "checkbox">
                <label class = "col-sm-5"><input type = "checkbox" name = "remember">Remember Me</label>
                <a href = "#" class = "col-sm-4">Forget Password ?</a>				
             </div>
          </div>
       </div>
       <br>
       <div class = "form-group">
          <div class = "col-sm-offset-3 col-sm-6">
             <button type = "submit" class = "submit btn btn-block" id = "submit">Sign In</button><br>
          </div>
       </div>
       
       
       <div class = "form-group">
          <div class = "text-center">
             <p>Or Sign In with</p>
          </div>
       </div>
       <div class = "form-group">
          <div class = "text-center">
             <i class="fa fa-facebook" aria-hidden="true"></i>
             <i class="fa fa-twitter"></i>
             <i class="fa fa-google"></i>
          </div>
       </div>
       <br>
       <div class = "form-group">			
          <div class = "text-center">
             <label class = "control-label">Not a member ? <a href = "signUp.php">Register</a></label>
          </div>
       </div>

    </form>

 </div>


 <script>
    $(document).ready(function(){

       $("#email").on("blur", function(){
          var email = $("#email").val();

          if(email == ""){
             $(".email").removeClass("has-success");
             $(".gly_em").removeClass("glyphicon-ok");
             $(".email").addClass("has-error");
             $(".gly_em").addClass("glyphicon-remove");
             return false;
          }
          else
          {
             $(".email").removeClass("has-error");
             $(".gly_em").removeClass("glyphicon-remove");	
          };

          if(isEmail(email) == false){
             $(".email").addClass("has-error");
             $(".gly_em").addClass("glyphicon-remove");
             $(".email").removeClass("has-success");
             $(".gly_em").removeClass("glyphicon-ok");
             return false;
          }
          else{
             $(".email").removeClass("has-error");
             $(".gly_em").removeClass("glyphicon-remove");	
             $(".email").addClass("has-success");
             $(".gly_em").addClass("glyphicon-ok");
          };
       });
       $("#pwd").on("blur", function(){
          var pwd = $("#pwd").val();

          if(isValidPassword(pwd) == false)
          {
             $(".pwd").addClass("has-error");
             $(".gly_pwd").addClass("glyphicon-remove");
             $(".pwd").removeClass("has-success");
             $(".gly_pwd").removeClass("glyphicon-ok");
             return false;
          }
          else{
             $(".pwd").removeClass("has-error");
             $(".gly_pwd").removeClass("glyphicon-remove");	
             $(".pwd").addClass("has-success");
             $(".gly_pwd").addClass("glyphicon-ok");
          };
       });
    });


 function isEmail(email){
    var regex = /^([a-zA-Z0-9_\.\-\+]{2,30})+\@([a-zA-Z0-9\-]{3,10})+\.([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)){
       return false;
    }
    else{
       return true;
    }
 }
 function isValidPassword(password){
    var regex =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
    if(!regex.test(password)){
       return false;
    }
    else{
       return true;
    }
 }


 </script>
   
</body>
<footer class="footer">
    <p>Author: John Doe</p>
  <p><a href="mailto:john.doe@example.com">john.doe@example.com</a></p>
  <p>&copy; 2024 Company Name. All rights reserved.</p>
   </footer>
</html>