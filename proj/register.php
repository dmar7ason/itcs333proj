
<?php
include("functions.php");
include("session.php");
require("connection.php");
?>
<html>
    <head>
    <style>
    
    </style>
    <title>Hypermarket -register </title>
        <script>
            var fnerror=lnerror=merror=perror=unerror=emerror=cperror = false;
function firstNameValidation()
		{
           $fn_re = /^[a-zA-Z ]{2,20}$/i;
			if ((document.registerForm.firstName.value).length == 0)
			{
				document.getElementById("fn_err").innerHTML = "";
				return;
			}
			
			if (!$fn_re.test(document.registerForm.firstName.value))
			{
				document.getElementById("fn_err").innerHTML = "First name must contains only alphabetics and must be between 2-20 characters";
				fnerror = true;
				return false;
			}
			else
			{
				document.getElementById("fn_err").innerHTML = "";
				fnerror = false;
			}
		}
		
		function lastNameValidation()
		{
			$ln_re = /^[a-zA-Z ]{2,20}$/i;
			if ((document.registerForm.lastName.value).length == 0)
			{
				document.getElementById("ln_err").innerHTML = "";
				return;
			}
			else if (!$ln_re.test(document.registerForm.lastName.value))
			{
				document.getElementById("ln_err").innerHTML = "Last name must contains only alphabetics and must be between 2-20 characters";
				lnerror = true;
				return false;
			}
			else
			{
				document.getElementById("ln_err").innerHTML = "";
				lnerror = false;
			}
		}
		
		function mobileValidation()
		{
			$m_re =/^((\+|00)973)?\s?|d{8}$/;
			if ((document.registerForm.mobile.value).length == 0)
			{
				document.getElementById("m_err").innerHTML = "";
				return;
			}
			else if (!$m_re.test(document.registerForm.mobile.value))
			{
				document.getElementById("m_err").innerHTML = "Mobile must have only numbers and must be between 11-15 digits";
				merror = true;
				return false;
			}
			else
			{
				document.getElementById("m_err").innerHTML = "";
				merror = false;
			}
		}
		
		function passwordValidation()
		{
			if ((document.registerForm.password.value).length == 0)
			{
				document.getElementById("pw_err").innerHTML = "";
				return;
			}
			else if (document.registerForm.password.value == document.registerForm.confirmPassword.value)
			{
				if ((document.registerForm.password.value).length >= 6 && (document.registerForm.password.value).length <= 16)
				{
					document.getElementById("cpw_err").innerHTML = "";
					document.getElementById("pw_err").innerHTML = "";
					perror = false;
				}
				else
				{
					document.getElementById("pw_err").innerHTML = "Password must have 6-16 characters";
					perror = true;
					return false;
				}
			}
			else
			{
				document.getElementById("pw_err").innerHTML = "Passwords doesn't match";
				perror = true;
				return false;
			}
		}
		
		function usernameValidation()
		{
			if ((document.registerForm.username.value).length == 0)
			{
				document.getElementById("un_err").innerHTML = "";
				return;
			}
				if ((document.registerForm.username.value).length >= 3 && (document.registerForm.username.value).length <= 20)
				{
					document.getElementById("un_err").innerHTML = "";
					error=checkUN();
					if (unerror == true)
					{
						return false;
					}
				}
				else
				{
					document.getElementById("un_err").innerHTML = "Username must have 3-20 characters";
					unerror = true;
					return false;
				}
		}
		
		function emailValidation()
		{
            $em_re= /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
			if ((document.registerForm.email.value).length == 0)
			{
				document.getElementById("e_err").innerHTML = "";
				return;
			}
            else if (!$em_re.test(document.registerForm.email.value))
			{
				document.getElementById("e_err").innerHTML = "email invaled";
				enrror = true;
				return false;
			}
			
			else
			{
				document.getElementById("e_err").innerHTML = "";
				enrror = false;
			}
		}
		
		function confirmPasswordValidation()
		{
			if (document.registerForm.password.value == document.registerForm.confirmPassword.value)
			{
				if ((document.registerForm.password.value).length >= 6 && (document.registerForm.password.value).length <= 16)
				{
					document.getElementById("cpw_err").innerHTML = "";
					document.getElementById("pw_err").innerHTML = "";
					cperror = false;
				}
				else
				{
					document.getElementById("pw_err").innerHTML = "Password must have 6-16 characters";
					document.getElementById("cpw_err").innerHTML = "";
					cperror = true;
					return false;
				}
			}
			else
			{
				document.getElementById("cpw_err").innerHTML = "Passwords doesn't match";
				cperror = true;
				return false;
			}
		}
        /*function validation()
		{
			if (document.getElementById("terms").checked == false)
			{
				alert("You must accept terms and conditions to register");
				return false;
			}
			else
			{
				firstNameValidation();
				if (error == true)
				{
					return false;
				}
				lastNameValidation();
				if (error == true)
				{
					return false;
				}
				mobileValidation();
				if (error == true)
				{
					return false;
				}
				passwordValidation();
				if (error == true)
				{
					return false;
				}
				confirmPasswordValidation();
				if (error == true)
				{
					return false;
				}
				error=usernameValidation();
				if (error == true)
				{
					return false;
				}
				error=emailValidation();
				if (error == true)
				{
					return false;
				}
			}
			if (error == true)
			{
				return false;
			}
			else
			{
				return true;
			}
		}*/
        function validation()
        {
            document.forms[0].JSEnabled.value="TRUE";
            return(fnerror&&lnerror&&merror&&perror&&unerror&&emerror&&cperror);
        }
        </script>
    </head>

    
    <body>
        <?php
        if( isset($_SESSION['active_user'])!="" )
        {
            header("Location: index.php");
        }
        else
        {
        ?>
        <div id="main_container">
		  <div class="top_bar">
		  <?php // include("header.php"); ?>
		  <div id="main_content">
			<div id="menu_tab">
		  <?php // include("top_menu.php"); ?>
			</div>
			<!-- end of menu tab -->
			<div class="crumb_navigation"> Navigation: <span class="current">Register</span> </div>
			<div class="center_content2" align="center">
			  <div class="title_box">Register</div>
			  <div class="main_border_box">
				<table width="100%">
				<tr>
        <table width="580px" style="margin: 10px auto;">
        <tr><?php
        $emptyFields = false;
		$fnerror=$lnerror=$merror=$perror=$unerror=$emerror=$cperror=$terror  = false;
		$success = false;
		$fn = "";
		$ln = "";
		$un = "";
		$pw = "";
		$cpw = "";
		$em = "";
		$mob = "";
		$addr = "";
		$t="";
        extract($_POST);
		if (isset($_GET["a"]))
		{
			$fn = $_POST['firstName'];
			$ln = $_POST['lastName'];
			$un = $_POST['username'];
			$pw = $_POST['password'];
			$cpw = $_POST['confirmPassword'];
			$em = $_POST['email'];
			$mob = $_POST['mobile'];
			$addr = $_POST['address'];
			$t = $_POST['type'];
		}
        extract($_GET);
		if(isset($_GET['a']))
		{
			if(!isset($_POST["terms"]))
			{
				error("You must accept terms and conditions to register");
				$terror  = true;
			}
			else
			{
				foreach($_POST as $k=>$v)
				{
					if(empty($_POST[$k]))
					{
							error("Please fill all the required fields");
							$emptyFields = true;
							$error = true;
							break;
						
					}
				}
				if(!$emptyFields)
				{
					$query = "SELECT email FROM users WHERE email='$em'";
					$result = $db->query($query);
					$count = $result->rowCount();
					if($count!=0)
					{
						error("An account with the same email already registered"); 
						$emerror = true;
					}
					if ((!(strlen($un) >= 3 && strlen($un) <= 20)) && !$error)
					{
						error("Username must have 3-20 characters"); 
						$unerror = true;
					}
					$query = "SELECT username FROM users WHERE username='$un'";
					$result = $db->query($query);
					$count = $result->rowCount();
					if($count!=0 && !$error)
					{
						error("An account with the same username already registered"); 
						$$cperror = true;
					}
					if($_POST['password'] != $_POST['confirmPassword'] && !$error)
					{ 
						error("Passwords is not matching"); 
						$cperror = true;
					}
					if (!$error && !(strlen($_POST['password']) >= 6 && (strlen($_POST['password'])) <= 16))
					{
						error("Password length must be between 6 and 16 characters"); 
						$perror = true;
					}
					else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && !$error)
					{
						error("Invalid email address"); 
						$emerror = true;
					}
				}
			}
            if (!$error && !$emerror && !$cperror && !$perror && !$terror && !$fnerro && !$lnerror && !$merror)
			{
				$hash_password = md5($pw);
				$pic = "profilePictures/default.png";
				$query = "INSERT INTO users (first_name, last_name, username, password, email, address, mobile, type, picture) VALUES
				(?,?,?,?,?,?,?,?,?)";
				$result = $db->prepare($query);
				$result->bindParam(1, $fn);
				$result->bindParam(2, $ln);
				$result->bindParam(3, $un);
				$result->bindParam(4, $hash_password);
				$result->bindParam(5, $em);
				$result->bindParam(6, $addr);
				$result->bindParam(7, $mob);
				$result->bindParam(8, $t);	
				$result->bindParam(9, $pic);				
				$result->execute();
				
				if ($result)
				{
					$success = true;
					$_SESSION['active_user'] = $un;
					$_SESSION['active_user_type'] = $t;
					$_SESSION['active_user_id'] = $db->lastInsertId();
					//header( "refresh:3;url=index.php" );
					success("You have been registered successfully, <a href='index.php'>Click here to go to the home page</a>");
				}
				else
				{
					error("Failed");
				}
			}
			$db=NULL;
		}
        ?>

        </tr>
        <form method='post' name="registerForm" onsubmit="return validation()">
        <?php if (!$success)
		{ ?>
		<tr>
			<table style="padding: 10px; margin: 10px auto;">
			<tr><td colspan="2"><hr /></td></tr>
			<tr>
				<td width="150px">First Name<span style="color:#FF0000;"> *</span></td>
				<td align="left" width="250px"><input required onkeyup="firstNameValidation()" type="text" name="firstName" maxlength="20" size="40" placeholder="e.g. Ali" <?php echo "value='$fn'";?>>
				<span id="fn_err" style="color: red;"></span></td>
			</tr>
			<tr>
				<td width="150px">Last Name<span style="color:#FF0000;"> *</span></td>
				<td align="left" width="250px"><input required onkeyup="lastNameValidation()" type="text" name="lastName" maxlength="20" size="40" placeholder="e.g. Alsanea" <?php echo "value='$ln'";?>>
				<span id="ln_err" style="color: red;"></span></td>
			</tr>
			<tr>
				<td width="150px">Address<span style="color:#FF0000;"> *</span></td>
				<td align="left" width="250px"><input required type="text" name="address" maxlength="150" size="40" placeholder="e.g. House: 1111, Road: 111, Block: 112, Muharraq" <?php echo "value='$addr'";?>></td>
			</tr>
			<tr>
				<td width="150px">Mobile<span style="color:#FF0000;"> *</span></td>
				<td align="left" width="250px"><input required onkeyup="mobileValidation()" type="text" name="mobile" maxlength="15" size="40" placeholder="e.g. 97336111111" <?php echo "value='$mob'";?>>
				<span id="m_err" style="color: red;"></span></td>
			</tr>
			<tr><td colspan="2"><hr /></td></tr>
			<tr>
				<td width="150px">Username<span style="color:#FF0000;"> *</span></td>
				<td align="left" width="250px"><input required onkeyup="usernameValidation(this.value)" type="text" name="username" maxlength="20" size="40" placeholder="Username" <?php echo "value='$un'";?>>
				<span id="un_err" style="color: red;"></span></td>
			</tr>
			<tr>
				<td width="150px">Password<span style="color:#FF0000;"> *</span></td>
				<td align="left" width="250px"><input required onkeyup="passwordValidation()" type="password" name="password" maxlength="16" size="40" placeholder="Password" <?php echo "value=$pw";?>>
				<span id="pw_err" style="color: red;"></span></td>
			</tr>
			<tr>
				<td width="150px">Confirm Password<span style="color:#FF0000;"> *</span></td>
				<td align="left" width="250px"><input required onkeyup="confirmPasswordValidation()" type="password" name="confirmPassword" maxlength="16" size="40" placeholder="Confirm Password" <?php echo "value=$cpw";?>>
				<span id="cpw_err" style="color: red;"></span></td>
			</tr>
			<tr>
				<td width="150px">Email<span style="color:#FF0000;"> *</span></td>
				<td align="left" width="250px"><input required onkeyup="emailValidation(this.value)" type="email" name="email" maxlength="60" size="40" placeholder="e.g. example@domain.com" <?php echo "value='$em'";?>>
				<span id="e_err" style="color: red;"></span></td>
			</tr>
			<tr><td colspan="2"><hr /></td></tr>
				<td width="150px">Account Type<span style="color:#FF0000;"> *</span></td>
				<td width="250px" align="left"><input type="radio" name="type" value="consumer" <?php 
				if (!isset($_POST['type']) || $_POST['type'] == "consumer")
				{
					echo "checked";
				}
				?>
				/>Consumer &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<input type="radio" name="type" value="seller" <?php 
				if (isset($_POST['type']) && $_POST['type'] == "seller")
				{
					echo "checked";
				}
				?>/>Seller</td>
			<tr><td colspan="2"><hr /></td></tr>
			<tr><td colspan="2"><input id="terms" type="checkbox" name="terms" <?php 
			if (isset($_POST['terms']))
			{
				echo "checked";
			}
			?>> I accept <a href="terms.php">Terms and Conditions</a></td></tr>
			<tr>
				<td align="center" colspan="2"><input id='color'type="submit" value="Create Account"></td>
			</tr>
			</form>
			</table>
		</tr>
		<?php } ?>
        </table>
	</tr>
	</table>
			  </div>
			  <br />
			</div>
			<!-- end of center content -->
		  </div>
		  <!-- end of main content -->
		  <div class="footer">
			<div class="center_footer"> All Rights Reserved<br />
			<br />
		</div>
		  </div>
		</div>
		<!-- end of main_container -->
        <?php } ?>
    </body>
</html>