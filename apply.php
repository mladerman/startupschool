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
	
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-29629736-1']);
	  _gaq.push(['_setDomainName', 'bostonstartupschool.com']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type =
	'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' :
	'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	
	<script type="text/javascript">
    (function(c,a){window.mixpanel=a;var b,d,h,e;b=c.createElement("script");
    b.type="text/javascript";b.async=!0;b.src=("https:"===c.location.protocol?"https:":"http:")+
    '//cdn.mxpnl.com/libs/mixpanel-2.1.min.js';d=c.getElementsByTagName("script")[0];
    d.parentNode.insertBefore(b,d);a._i=[];a.init=function(b,c,f){function
d(a,b){
    var c=b.split(".");2==c.length&&(a=a[c[0]],b=c[1]);a[b]=function(){a.push([b].concat(
    Array.prototype.slice.call(arguments,0)))}}var
g=a;"undefined"!==typeof f?g=a[f]=[]:
    f="mixpanel";g.people=g.people||[];h=['disable','track','track_pageview','track_links',
    'track_forms','register','register_once','unregister','identify','name_tag',
    'set_config','people.identify','people.set','people.increment'];for(e=0;e<h.length;e++)d(g,h[e]);
    a._i.push([b,c,f])};a.__SV=1.1;})(document,window.mixpanel||[]);
    mixpanel.init("5bdbae42c47abbbb0ae7e2133270b503");
</script>
	
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
					<div id="top" class="sectiontitle">Apply</div>
				</div>
			</div>
		</div>
	</div>
	<div id="mainContent">
		<div class="container">
			<div class="row">
				<div class="span12">
				<br><br>
				<table>
					<tr>
						<td>
							<div id="fullapp">
							<div class="sectionsubtitle">Your application:</div>
							<div class="alert alert-info">The next class of Boston Startup School begins on November 5th, 2012. The program is highly selective; please apply early so that we have a chance to get to know you better. This program is all about the people, so show us who you really are.</div>
							<form id="fullappform">							
							Full name:<br>
							<input id="fullname" type="text" />
							<br><br>
							Email address:<br>
							<input id="email" type="email" />
							<br><br>
							What college/university do you attend, what is your major, and what year are you?<br>
							<input class="span4" id="edu" type="text" />
							<br><br>
							Which track are you applying to?<br>
							<input value="productdesign" name="trackgroup" type="radio" /> Track A - Product & Design<br>
							<input value="bizdevsales" name="trackgroup" type="radio" /> Track B - Biz. Dev. & Sales<br>
							<input value="marketing" name="trackgroup" type="radio" /> Track C - Marketing<br>
							<input value="softwaredev" name="trackgroup" type="radio" /> Track D - Software Development<br>
							<br>
							<p>In fewer than 140 characters, who are you?</p>
							<textarea  class="span6"style="resize: vertical;" name="limitedtextarea" id="whoareyou" onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown1,140);" onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown1,140);"></textarea><br>
							<font size="1">You have <input readonly type="text" name="countdown1" size="3" value="140" style="border: 0px; background: transparent; width: 30px;"> characters left.</font>
							<br><br>
							<p>Please provide a link to your profile on LinkedIn:</p><br>
							<input id="linkedin" type="text" class="span6" />
							<br><br>
							<p>Where's your social footprint?  Please provide up to five (5) additional links to websites that show us who you are online and what you like to do. (eg. GitHub, Twitter, blog, about.me, etc.)</p>
							<input id="foot1" type="text" class="span6" /><br>
							<input id="foot2" type="text" class="span6" /><br>
							<input id="foot3" type="text" class="span6" /><br>
							<input id="foot4" type="text" class="span6" /><br>
							<input id="foot5" type="text" class="span6" /><br>
							<br><br>
							<p>Please tell us: (1) why you would like to enroll in Boston Startup School, and (2) what makes you a strong candidate for admission.</p>
							<textarea class="span6" style="resize: vertical;" name="whybss" id="whybss" ></textarea>
							<br><br>
							<p>Tell us about something you created or accomplished that you are most proud of and why it wouldn't have happened without you.</p>
							<textarea  class="span6"style="resize: vertical;" name="proudof" id="proudof" ></textarea>
							<br><br>
							<p>In fewer than 250 characters, why do you think you will be an awesome hire upon completion of this program?</p>
							<textarea  class="span6"style="resize: vertical;" name="awesomehire" id="awesomehire" onKeyDown="limitText(this.form.awesomehire,this.form.countdown2,250);" onKeyUp="limitText(this.form.awesomehire,this.form.countdown2,250);"></textarea><br>
							<font size="1">You have <input readonly type="text" name="countdown2" size="3" value="250" style="border: 0px; background: transparent; width: 30px;"> characters left.</font>
							<br><br>
							<p>(<i>Optional</i> ) Is there anything else we should know about you?  If someone referred you to our program, use this space to let us know who that was!</p>
							<textarea  class="span6"style="resize: vertical;" name="anythingelse" id="anythingelse" onKeyDown="limitText(this.form.anythingelse,this.form.countdown3,999);" onKeyUp="limitText(this.form.anythingelse,this.form.countdown3,999);"></textarea><br>
							<font size="1">You have <input readonly type="text" name="countdown3" size="3" value="999" style="border: 0px; background: transparent; width: 30px;"> characters left.</font>
							<br><br>
							<a id="submitapp" class="btn btn-orange btn-large">Submit Application</a>
							</form>
							<br>
							
							</div>
							<div id="confirm_msg" style="display: none;" class="alert"></div>
						</td>
					</tr>
				</table>
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