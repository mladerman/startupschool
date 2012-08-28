<?

	require("common.php");
	$email = $_GET["email"];
	$token = $_GET["token"];
	
	$sql = sprintf("SELECT uid, name, password, confirmed FROM users WHERE email='%s'", $email);
	$result = mysql_query($sql);
	
	$confirmed = 0;
	
	if(!$result)
	{
		$confirmed = 0;
	}
	else if(mysql_num_rows($result) == 0)
	{
		$confirmed = 0;
	}
	else
	{
		$row = mysql_fetch_array($result);
		$confirmedval = $row["confirmed"];
		$name = $row["name"];
		$password = $row["password"];
		$id = $row["uid"];
		
		if(passtotoken($password) == $token)
		{
			if($confirmedval == 0)
			{
				$sql_update = sprintf("UPDATE users SET confirmed=1 WHERE email='%s'", $email);
				$res_update = mysql_query($sql_update);
				$confirmed = 1;
			}
			else
			{ // reconfirmation...
				$confirmed = 2;
			}
		}
		else
		{
			$confirmed = 0;
		}
		
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
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/custom.js"></script>
</head>

<body>
<div id="wrapper">
	<div id="header">
		<div id="top" class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="nav-collapse pull-left">
					<ul class="nav">	
						<li><a class="scroll" id="target_about">About</a></li>

						<li><a class="scroll" id="target_tracks">Program</a></li>

						<li><a class="scroll" id="target_why">Why Startup School</a></li>

						<li><a class="scroll" id="target_team">Team</a></li>	

						<li><a class="scroll" id="target_partners">Partners</a></li>

						<li><a class="scroll" id="target_press">Press</a></li>

						<li><a href="http://blog.bostonstartupschool.com" target="_blank">Blog</a></li>	

						<li><a class="scroll" id="target_contact">Contact</a></li>	

						<li><a class="scroll" id="target_apply">Apply Now!</a></li>	
						<li class="divider-vertical"></li>
						<li><input type="text" id="searchbox" name="searchbox" /></li>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="topContent">
		<div class="container">
			<!-- row for logo -->
			<div class="row">
				<div class="span5">
					<a href="index.php"><img src="_images/logo/bssLogo_up.png" alt="Boston Startup School Logo" name="bssLogo" width="350" height="125" border="0" id="bssLogo" /></a>
				</div>
				<div class="span7">
					<div id="top" class="sectiontitle">Account confirmation</div>
				</div>
			</div>
		</div>
	</div>
	<div id="mainContent">
		<div class="container">
			<div class="row">
				<div class="span12">


				<?
				
					if($confirmed == 0)
					{
						print('<br>Confirmation failed.  Please contact the site administrator.<br><br>');
					}
					else if($confirmed == 2)
					{
						$_SESSION["user"] = array();
						$_SESSION["user"]["name"] = $name;
						$_SESSION["user"]["email"] = $email;
						$_SESSION["user"]["id"] = $id;
						print('Your account has already been confirmed.<br><br><a href="index.php">Continue to site.</a><br>');
					}
					else
					{
						$_SESSION["user"] = array();
						$_SESSION["user"]["name"] = $name;
						$_SESSION["user"]["email"] = $email;
						$_SESSION["user"]["id"] = $id;
						print('<br>Your account has been confirmed!<br><br><a href="index.php">Continue to site.</a><br>');
					}
				?>
				</div>
			</div>
		</div>
	</div>
	<div id="bottomContent">
		<div class="container">
			<div id="socialNav">
				<div class="social" id="rssIcon"></div>
				<div class="social" id="fbIcon"></div>
				<div class="social" id="twitIcon"></div>
				<div class="social" id="linkedInIcon"></div>
			</div>
			
			<div id="footer">
				<span class="footerLinks"><a href="index.php#about">About</a> | <a href="index.php#tracks">Program</a> | <a href="index.php#why">Why</a> | <a href="index.php#team">Team</a> | <a href="index.php#partners">Partners</a> | <a href="index.php#press">Press</a> | <a href="faq.html">FAQ</a> | <a href="apply.php">Apply</a> | <a href="contact.php">Contact</a></span>
				<br>
				<span class="footerCopyright">&copy; 2012 Boston Startup School | <a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms and Conditions</a></span>
			</div>
		</div> 
	</div> 
</div>
</body>
</html>