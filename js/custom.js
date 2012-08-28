var state = 1;
var car = 1;
var timeoutId = 1;

$(document).ready(function() {

	var successHtml = 'Thank you for your interest in Boston Startup School!  We will contact you at the email address you specified.';
	var failureHtml = 'Please confirm verify that you filled in all of the required fields on the application.';
	
	
	var msgDiv = $("div#confirm_msg");
	var fullApp = $("div#fullapp");
	var submitbutton = $("a#submitapp");
	
	timeoutId = setTimeout("cycleCTA()", 7000);
	
	
	/* full application */
	
	submitbutton.click(function(event) {
	
		var emailagain = $("#email").val();
		var fullname = $("#fullname").val();
		var edu = $("#edu").val();
		var track = $("input[name=trackgroup]:checked").val();
		var whoareyou = $("#whoareyou").val();
		var linkedin = $("#linkedin").val();
		var foot1 = $("#foot1").val();
		var foot2 = $("#foot2").val();
		var foot3 = $("#foot3").val();
		var foot4 = $("#foot4").val();
		var foot5 = $("#foot5").val();
		var whybss = $("#whybss").val();
		var proudof = $("#proudof").val();
		var awesomehire = $("#awesomehire").val();
		var anythingelse = $("#anythingelse").val();
		
		if(emailagain == "" || fullname == "" ||
			edu == "" || track == "" ||
			whoareyou == "" || linkedin == "" ||
			whybss == "" || proudof == "" ||
			awesomehire == "")
		{
			// indicate required fields
			msgDiv.html(failureHtml);
			msgDiv.removeClass("alert-success").addClass("alert-error");
			msgDiv.slideDown(400);			
			
			return false;
		}
		
		// store info in db
		$.post("submit_app.php", {email:emailagain, fullname:fullname, edu:edu, track: track, whoareyou:whoareyou, linkedin:linkedin,
									foot1:foot1,foot2:foot2,foot3:foot3,foot4:foot4,foot5:foot5,why:whybss,proud:proudof,
									awesome:awesomehire,anythingelse:anythingelse},
								function () {
								
			msgDiv.html(successHtml);
			msgDiv.removeClass("alert-error").addClass("alert-success");
			msgDiv.slideDown(400);	
			fullApp.slideUp();
		
		}, "json");
		
		scrolling("top");
								
		
	});
	
	/* end full application */
	
	$("a.scroll").click(function() {
	
		var path = $(this).attr("id").split("_")[1];			
		scrolling(path);
	
	});
	
	$("div#fullapp textarea,div#fullapp input").focus(function(event) {
	
		msgDiv.slideUp();
	
	});
	
	$("div#leftarrow").click(function(event) {
	
		car--;
		if(car <= 0)
		{
			car = 4;
		}
		alert(car);
		cycleCTA();
	
	});
	
	$("div#leftarrow").click(function(event) {
	
		car++;
		if(car > 4)
		{
			car = 1;
		}
		alert(car);
		cycleCTA();
	
	});
		
});


function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}


function cycleCTA()
{
	var p1 = $("span#cta1");
	var p2 = $("span#cta2");
	var p3 = $("span#cta3");
	var p4 = $("span#cta4");
	
	if(car == 1)
	{
		p1.fadeOut(600, function() { p2.fadeIn(600); });
		car = 2;
		
	}
	else if(car == 2)
	{
		p2.fadeOut(600, function() { p3.fadeIn(600); });
		car = 3;
	}
	else if(car == 3)
	{
		p3.fadeOut(600, function() { p4.fadeIn(600); });
		car = 4;
	}
	else if(car == 4)
	{
		p4.fadeOut(600, function() { p1.fadeIn(600); });
		car = 1;
	}
	
	timeoutId = setTimeout("cycleCTA()", 7000);
}

function scrolling(id)
{
	$("html,body").animate({scrollTop: $("#" + id).offset().top - 60}, 1000);
}