<style>
 #error-msg{
  display: none;
  color: #ff2851;
  font-size: 14px;
  margin-top: 10px;
}
#error-msg1{
  display: none;
  color: #ff2851;
  font-size: 14px;
  margin-top: 2px;
}

</style>
<?php 
session_start();

	include("connection.php");
	include("functions.php");
  if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
    $first_Name = $_POST['firstName'];
		$last_name = $_POST['lastName'];
    $email = $_POST['email'];
		$password = $_POST['password'];
		$phone = $_POST['phone_Number'];

	#	$password = $_POST['password'];

		if(!empty($first_Name) &&!empty($last_name) &&!empty($email) && !empty($password)&& !empty($phone) && !is_numeric($email))
		{

			//save to database
			//$user_id = random_num(20);
   
      
			$query = "insert into customers (firstName,lastName,email,password,phone_Number,user_id) values ($first_Name,$last_name,'$email','$password',$phone ,'$user_id')";

			mysqli_query($con, $query);
      $query2="select  from customers user_id WHERE email=$email";
      mysqli_query($con, $query2);
         $subject = "This is subject";
         $header = "From:my-gmail-id@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         $retval = mail ($email,$subject,$query2,$header);

			header("Location: sign_in.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}

?>
<!DOCTYPE html>
<html>
  
 
<head>

  <title>Transportz</title>
  
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <section class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container d-lg-none">
          <a class="navbar-brand" href="#">
            <div class="logo-box">
              <img src="images/logo.png" alt="">
              <span>
               NRNTYF
              </span>
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="LandingPageForVisitors.html">Home <span class="sr-only">(current)</span></a>
              </li>
              
            </ul>
          </div>
        </nav>
        <div class="header_container ">
          <div class="logo-box">
            <img src="images/logo.png" alt="">
            <span>
             NRNTYF
            </span>
          </div>
          <div>
            <div class="header_top">
              <div class="header_top-contact">

                <a href="" class="ml-4">
                  <div>
                    <img src="images/phone.png" alt="" />
                  </div>
                  <span>
                    (+71) 258964785
                  </span>
                </a>
                <a href="" class="ml-4">
                  <div>
                    <img src="images/mail.png" alt="" />
                  </div>
                  <span>
                    NRNTYF@gmail.com
                  </span>
                </a>
              </div>
              <div class="header_top-social">
                <div>
                  <a href="">
                    <img src="images/fb.png" alt="">
                  </a>
                </div>
                <div>
                  <a href="">
                    <img src="images/twitter.png" alt="">
                  </a>
                </div>
                <div>
                  <a href="">
                    <img src="images/g-plus.png" alt="">
                  </a>
                </div>
                <div>
                  <a href="">
                    <img src="images/linkedin.png" alt="">
                  </a>
                </div>
              </div>
            </div>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                      <li class="nav-item active">
                        <a class="nav-link" href="LandingPageForVisitors.html">Home <span class="sr-only">(current)</span></a>
                      </li>
                    
                    </ul>

                  </div>

                </div>
              </nav>
        </div>
      </div>
    </section>
    <!-- end header section -->
  <div id="user" >
    <h2 class="cz">Sign_up:-</h2>
    <form  class="siu" action="insert.php"  method="post" >
      <label for="fname">First name: </label>
      <input type="text" id="fname"  minlength="3" maxlength="100" placeholder="First Name" name="firstName" required ><br>
      <label for="lname">Last name: </label>
      <input type="text"  minlength="3" maxlength="100" id="lname"placeholder="Last Name" name="lastName" required ><br>
      <label for="mail">Email:</label>
      <input type="email" id="mail" oninput="checker()" placeholder="email@gmail.com" name="email" required ><br>
      <div id="icon"> </div>
      <p id="error-msg">Please Enter A Valid Email</p>
      <br>
      <label for="phone_number" >phone_number:     </label>
      <input type="tel" id="pnum"  placeholder="555-5555-5555"  pattern="[0-9]{3}[0-9]{4}[0-9]{4}"name="phone_Number" required><br>
      <label for="password">password:</label><br>
      <input id="password1"  type="password"  placeholder="Create Password (Min. 8 Characters)" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"id="pass"   name="Password" required ><br>
      <div id="icon"> </div>
      <div id="icon1"> </div>
      <p id="error-msg1">The Password doesn't Match!</p>
      <br>
      <label for="password">confirmed password:</label><br>
      <input  id="password2" oninput=" check()" type="password" placeholder="Confirm Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"  id="pass"  name ="confirmed_paasword"  required><br>
     <button name="submit"  type="submit" class="submit1"  > submit  </button>
    </form> 

  </div>


  <script  src="js/password.js"></script>
  <script  src="js/submit.js"></script>
  <script  src="js/email.js"></script>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script></script>
  

</body>

</html>