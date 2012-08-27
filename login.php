<?
	require("common.php");
	if(!$_GET)
	{
		$action = "";
	}
	else
	{
		$action = $_GET["action"];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Boston StartUp School - The best place for young professionals to learn the skills needed to have an immediate and positive impact on the startup they join. An immersive program, that educates participants on the startup culture, team dynamics and one of four in-demand skill sets. You will have an opportunity to work with an incredible set of fellow students and meet Boston startup companies that are looking for top talent to grow their businesses." />
	<meta name="keywords" content="boston startup school, boston startup, boston, startup, start up, startups, school, startup job, startup employment, startup school, startup education, startup opportunities, startup industry, startup boston, startup curriculum, startup marketing, startup product design, startup sales and business development, startup website development, startup recruiting, startup recruiter, accelerator program, learn, boston jobs, learn product design, learn software development, learn marketing, learn sales, learn business development, biz dev, software dev, programming, training program, startup training, mentor training, startup mentoring, technology industry, big data, techstars, aaron ohearn, shaun johnson, katie rae, reed sturtevant, mark chang, harvard innovation lab, harvard ilab, masschallenge, mass challenge, hiring partner, learn to do" />
	<title>Boston StartUp School: A Place for Professionals to Learn Impactful Job Skills</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/custom.css" rel="stylesheet" type="text/css" />
	<link href="css/gallery.css" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/authentication.js"></script>
</head>

<body>
<div id="wrapper">
	<? 
		require("header.php"); 
	?>
	
	<div id="topContent">
		<div class="container">
			<!-- row for logo -->
			<div class="row">
				<div class="span5">
					<a href="index.php"><img src="_images/logo/bssLogo_up.png" alt="Boston Startup School Logo" name="bssLogo" width="350" height="125" border="0" id="bssLogo" /></a>
				</div>
				<div class="span7">
					<div id="top" class="sectiontitle">Log in / Request an account</div>
				</div>
			</div>
		</div>
	</div>
	<div id="mainContent">
		<div class="container">
			<div class="row">
				<div class="span12">
					<br><br>
					<?
						if($action == "reg")
						{
							print('<br><font size="4">Request access</font><br><br>
								<form id="signupform">
								<table class="noborder">
								<tr><td class="noborder middle" colspan="2"><input type="text" id="fullname" name="fullname" placeholder="Name"></td></tr>
								<tr><td class="noborder middle" colspan="2"><input type="text" id="email" name="email" placeholder="Email Address"></td></tr>
								<tr><td class="noborder middle" colspan="2"><input type="password" id="reg_pw" name="reg_pw" placeholder="Password"></td></tr>
								<tr><td class="noborder middle" colspan="2"><input type="password" id="reg_pw2" name="reg_pw2" placeholder="Confirm Password"></td></tr>
								<tr><td class="noborder middle"><a class="btn btn-primary" id="registerbutton">Request access</a></td></tr>
								<tr><td class="noborder middle"><a href="login.php">Already have an account?</a></td></tr>
								</table>
								</form>
								<div id="regerror" class="alert alert-info"></div>
								<br><br>');
						}
						else
						{
							print('
								<br><font size="4">Please log in to proceed:</font><br><br>
								<table class="noborder">
								<form id="loginform">
								<tr><td class="noborder middle" ><div id="error" class="alert alert-info" style="display:none;"></div></td></tr>
								<tr><td class="noborder middle"><input type="text" name="username" id="username" placeholder="Email Address" /></td></tr>
								<tr><td class="noborder middle"><input type="password" name="password" id="password" placeholder="Password" /></td></tr>
								<tr><td class="noborder middle"><a class="btn btn-primary" id="submitbutton">Login</a> or <a href="login.php?action=reg">request an account</a></td></tr>
								</form>
								</table>
								<br><br>');
						}
					?>
					<br><br><br>
				</div>
			</div>
		</div>
	</div>
	<?
		require("footer.php");
	?>
</div>
</body>
</html>