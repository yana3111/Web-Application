<!DOCTYPE html>
<html>
<head>
    <title>Booklyn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href= "C:\newXampp\htdocs\phpBooklyn\css\signup.css" rel="stylesheet" type="text/css" >
    <link  rel = "stylesheet" type = "text/css" href = "../css/signup.css">    
    
    <script src="../library/jquery-3.3.1.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    
</head>

<body>
    <!-- navigation start -->
    <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="80">
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

    </nav>
    <!-- navigation part end -->

    <div class="container">
        <!-- php -->
        <?php 
        if (isset($_POST["submit"]))
        {
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $repeatPassword=$_POST["repeatPassword"];
            $tel=$_POST["tel"];

            $passwordHash= password_hash($password,PASSWORD_DEFAULT);


            $errors= array();
            if(empty(fname)OR empty(lname)OR empty(email)OR empty(password)OR empty(repeatPassword)OR empty(tel)){
                array_push($errors,"All fields are empty");
            }
            if(!filter_var($email,FILTER_VALIDATE)){
                array_push($errors,"Email is not valid");
            }
            if(strlen($password)<8){
                array_push($errors,"Password must be at least 8 character long");

            }
            if($password!==$repeatPassword){
                array_push($errors,"Passwords doesn't match");
            }
            if(count($errors)>0){
                foreach($error as $error){
                  echo "<div class='alert alert-danger'>$error</div>"; 
                }

                


            }else{
                //insert data into database
                require_once "database.php";
                $sql="INSERT INTO 	userinfo (firstName, lastName, email, password, mobile) VALUES(?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_perpare($stmt,$sql);

                if($perpareStmt){
                    mysqli_stmt_bind_param($stmt,"sssss",  $fname,  $lname, $email, $passwordHash, $tel);
                    mysqli_stmt_execute($stmt);
                    echo "<div class ='alart alart-success'> You are registered successfully.</div>";
                }
                else{
                    die("Something went wrong");
                }
            }
        }
        ?>




        <div class="jumbotron text-center heading">
            <h1>Sign Up </h1>
        </div>

        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" name="fname" class="fname form-control">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" class="lname form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="email form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="pwd" class="pwd form-control">
            </div>
            <div class="form-group">
                <label for="repeatPassword">Confirm Password</label>
                <input type="repeatPassword" name="pwd1" class="pwd1 form-control">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="tel" name="mobile" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value=" Submit"></input>
            </div>
            
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>Author: John Doe</p>
        <p><a href="mailto:john.doe@example.com">john.doe@example.com</a></p>
        <p>&copy; 2024 Company Name. All rights reserved.</p>
    </footer>
    <!-- Footer end -->
</body>
</html>