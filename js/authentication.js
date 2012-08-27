
$(document).ready(function(){

	$("div#error").css("display", "none");
	$("div#regerror").css("display", "none");
	/* login */
	var user = $("#username");	
	var pass = $("#password");
	var submit = $("#submitbutton");
	
	/* register */
	var name = $("#fullname");
	var email = $("#email");
	var regpw = $("#reg_pw");
	var regpw2 = $("#reg_pw2");
	var role = $("select#roledropdown");
	var signup = $("#registerbutton");
	
	user.focus(function(event){
	
		$("div#error").css("display", "none");
	});
	
	pass.focus(function(event){
	
		$("div#error").css("display", "none");
	});
	
	// login
	submit.click(function(event){		
	
		$.post("login_process.php", {username:user.val(), password:pass.val()}, function(data){
		
			if(!data)
			{
				$("div#error").css("display", "none");
				pass.val("");
				pass.select();
				$("div#error").html("Invalid email/password combination.");
				$("div#error").slideDown(400);
			}
		
			else
			{
				if(data.confirmed == 0)
				{
					$("div#error").css("display", "none");
					user.val("");
					pass.val("");
					pass.select();
					$("div#error").html("Account not yet confirmed.");
					$("div#error").slideDown(400);
				}
				else
				{
					if(!data.redir || data.redir == "")
					{
						window.location = "./admin.php";
					}
					else
					{
						window.location = "." + data.redir;
					}
					
				}
			}
		
		}, "json");
	
		return false;
		
	});
	
	user.keypress(function(event) {
		code = (event.keyCode ? event.keyCode : event.which);
		if (code == 13 || code == 10)
		{
			submit.click();
		}
		
	});
	
	pass.keypress(function(event) {
		code = (event.keyCode ? event.keyCode : event.which);
		if (code == 13 || code == 10)
		{
			submit.click();
		}
		
	});
	
	signup.click(function(event){
	
		$.post("register.php", {fullname:name.val(), email:email.val(), reg_pw:regpw.val(), reg_pw2:regpw2.val(), role:role.val()}, function(data2){
			var result = data2.success;
			if(result == "success")
			{
				var reason = data2.reason;
				name.val("");
				email.val("");
				regpw.val("");
				regpw2.val("");
				role.val("");
				$("div#regerror").css("display", "none");		
				$("div#regerror").html(reason);
				$("div#regerror").slideDown(400);
			}
			
			else
			{
				var reason = data2.reason;
				regpw.val("");
				regpw2.val("");				
				$("div#regerror").css("display", "none");
				$("div#regerror").html(reason);
				$("div#regerror").slideDown(400);
			}
		
		}, "json");
		
		return false;
	
	});
	
	name.focus(function(event){
	
		$("div#regerror").css("display", "none");
	});
	
	email.focus(function(event){
	
		$("div#regerror").css("display", "none");
	});
	
	regpw.focus(function(event){
	
		$("div#regerror").css("display", "none");
	});
	
	regpw2.focus(function(event){
	
		$("div#regerror").css("display", "none");
	});
	
});

