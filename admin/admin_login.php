<?php

//session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$username=$_POST['email'];
$password = sha1(md5($_POST['password']));
$stmt=$conn->prepare("SELECT email,username,password,userid FROM Superadmin WHERE email=? or username=? and password=? ");
				$stmt->bind_param('sss',$email,$username,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$username,$password,$userid);
				$rs=$stmt->fetch();
			
				if($rs)
				{  
                    $_SESSION['userid']=$userid;

					header("location:admin_dashboard.php");
				}

				else
				{
					echo "<script>alert('Access Denied Please Check Your username and password again');</script>";
				}
            }
            ?>
<!DOCTYPE html>
<html lang="en">
    <!-- head -->
    <?php require_once("partials/head.php");?>
    <!-- ./Head -->
    <body class="form">
        <div class="form-container outer">
            <div class="form-form">
                <div class="form-form-wrap">
                    <div class="form-container">
                        <div class="form-content">
                            <h1 class="">liteERP  - SuperUser Sign In</h1>
                            <p class="">Please provide your authentication credentials</p>
                            
                            <form method="post" class="text-left">
                                <div class="form" method="post">
                                    <div id="username-field" class="field-wrapper input">
                                        <label for="username">USERNAME | EMAIL</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <input id="username" name="email" type="text" class="form-control" >
                                    </div>
                                    <div id="password-field" class="field-wrapper input mb-2">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">PASSWORD</label>
                                            <a target="_blank" href="admin_reset_pwd.php" class="forgot-pass-link">Forgot Password?</a>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                        <input id="password" name="password" type="password" class="form-control" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </div>

                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper">
                                            <input type="submit" class="btn btn-primary" name="login"value="Log In">
                                        </div>
                                    </div>

                                    <!--Implement this on higher versions
                                        <div class="division">
                                            <span>OR</span>
                                        </div>
                                        <div class="social">
                                            <a href="javascript:void(0);" class="btn social-fb">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> 
                                                <span class="brand-name">Facebook</span>
                                            </a>
                                        <a href="javascript:void(0);" class="btn social-github">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                                <span class="brand-name">Github</span>
                                            </a>
                                        </div>

                                        <p class="signup-link">Not registered ? <a href="auth_register_boxed.html">Create an account</a></p>
                                    -->
                                </div>
                            </form>

                        </div>                    
                    </div>
                </div>
            </div>
        </div>    
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
        <!-- END GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/authentication/form-2.js"></script>
    </body>
</html>