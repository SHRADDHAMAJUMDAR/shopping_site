<?php
    //redirect to user dashboard if already logged in
    //session_start();

    //if(isset($_SESSION['pg_active_uid'])){
       // header("location: exammaster/facultyhome.php");
     //   die(); //get out
   // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>ShopiT!</title>
<link rel="icon" href="res/images/shop.png" type="image/x-icon"/>

<link href="css/bootstrap-4.1.1/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap-4.1.1/bootstrap.min.js"></script> 
<script src="js/jquery-3.2.1/jquery.min.js"></script> 

<!-- CSS for username & password icons (works in combination with root/webfonts)-->
<link href="res/css/all.css" rel="stylesheet">


 	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"> -->
        
<style>
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
                        /*-------------------------*/
			/* background: #60a3bc !important; */
                        background: url('res/images/shopbg.png') no-repeat center center fixed; 
                         -webkit-background-size: cover;
                         -moz-background-size: cover;
                         -o-background-size: cover;
                         background-size: cover;
		}
		.user_card {
                    opacity: 0.95;
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #fffeee; /* #f39c12; */ /*#fffeee ;*/
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			background: #ffffff; /*#60a3bc; !important; */ /* should be same as above*/
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
			border: 2px solid white;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #00acd6; /* #c0392b !important; */
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #00acd6; /* #c0392b !important; */
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
</style>
</head>
    <body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="res/images/shop.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form name="myform" action="loginctrl.php" method="post" autocomplete="off" onsubmit="return validateForm();">
                    <!-- Role Selection Dropdown -->
                    <div class="input-group mb-3">
                     <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div> 
                      <label for="role" class="form-label">Select role</label>
                       <select class="form-select input_user" name="role" id="role">
                          <option value="3">Customer</option>
                           <option value="2">Employee</option>
                        </select>
                    </div>
                     
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div> 
                            <input type="text" id="usrname" name="usrname" class="form-control input_user" value="" placeholder="Username">
                            
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="usrpass" name="usrpass" class="form-control input_pass" value="" placeholder="Password">
                        </div>
                        <!--
                            <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                            </div>
                        -->
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="btnlogin" id="btnlogin" class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-center links" id="statusMsgDiv">
                    <?php 
                        if(isset($_REQUEST["err"])){
                            
                            if($_REQUEST["err"] == 1)
                            	$msg="Invalid username or Password";
                                elseif($_REQUEST["err"] == 2)
                                $msg="Some error occured !!";
                            elseif($_REQUEST["err"] == 20)
                                $msg="Session expired, please login again";
                            elseif($_REQUEST["err"] == 3)
                                $msg="You are not authorized to access this page. Please contact administrator.";
                        }
                            
                        if(isset($msg)){
                            echo $msg;
                        } else {
                            echo "Please login to access your system.";
                        }
                    
                    ?>
                    </div>
                    <!-- 
                    <div class="d-flex justify-content-center links">
                            <a href="#">Forgot your password?</a>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>


    </body>
    <script type="text/javascript">
          var matchFound = 0;
          
          function validateForm() {
              var user = document.forms["myform"]["usrname"].value;
              var pass = document.forms["myform"]["usrpass"].value;
              var role = document.getElementById("role").value;
              if(user==""){
                  document.getElementById("statusMsgDiv").innerHTML = "Please enter username";
                  return false;
              }
              if(pass==""){
                  document.getElementById("statusMsgDiv").innerHTML = "Please enter your password";
                  return false;
              }
              // Dynamically set the form action based on the selected role
            /*  if(role === "customer") {
                document.myform.action = "cust_index.php";
            } else if(role === "employee") {
                document.myform.action = "emp_index.php";
            }*/

              return true;
          }
        </script>
</html>