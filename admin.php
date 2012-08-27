<?
	require("common.php");
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
	<link href="css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.autocomplete.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/admin.js"></script>
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
					<div id="top" class="sectiontitle">Applications</div>
				</div>
			</div>
		</div>
	</div>
	<div id="mainContent">
		<div class="container">
			<div class="row">
				<div class="span12">
					<br><br>
					<strong>Welcome back, <? print($_SESSION["user"]["name"]); ?>!</strong> <a href="logout.php">Logout</a><br><br>
					<div id="filter">
					Show <select id="sortby">
										<option id="rec" name="rec">all</option>				
									</select>
					applications tagged as  <select id="tagsdd">
												<option id="ALL" name="ALL">show all tags</a>
												<?
													$most_pop_tags_sql = sprintf("SELECT tagval,count(*) AS num FROM tags GROUP BY tagval ORDER BY count(*) DESC LIMIT 0,5");
													$most_pop_tags_res = mysql_query($most_pop_tags_sql);
													while($row = mysql_fetch_array($most_pop_tags_res))
													{
														print('<option id="' . $row["tagval"] . '" name="' . $row["tagval"] . '">' . $row["tagval"] . ' (' . $row["num"] . ')</option>');
													}

												?>
												<option class="bottomopt" id="MORE" name="MORE">show more options...</option>
											</select>
					<br>Know what you're looking for?  Try <a class="searchtoggle">Advanced Search &raquo;</a>
					</div>
					<div id="search" style="display: none;">						
						Show 
							<select id="searchby">
								<option id="srec" name="srec">all</option>				
							</select> applications tagged as 
							<input name="longsearch" id="longsearch" type="search"> <a class="btn btn-gray" id="searchsubmit">Search</a>
						
						<br><a class="searchtoggle">&laquo; Back to Basic Search </a>
					</div>
					
					<div id="currfilters">
					</div>
					<br><br>
					<div id="applications">
					</div>
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