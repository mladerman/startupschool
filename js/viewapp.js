/*
	for admin.php, generates the list of applications
*/

var thenewcomment;
var alltags = [];
var showhow = "public";

var scrolltopflag = 0;
var globalaid = 0;

var clickedTag;
var tagMenu;

$(document).ready(function(){
			
    showApplication();
	
	$.post("get_all_tags.php", function(data) {
	
		alltags = data.tags;
		$("input#longsearch").autocomplete(alltags);
			
	}, "json");
	
	$("div#scrolltotop").click(function(event) {
	
		$("html, body").animate({ scrollTop: 0 }, 1500);
		return false;
	
	});
	
});

function showApplication()
{

	var get_contents = [];
	var parts = window.location.search.substr(1).split("&");
	for (var i = 0; i < parts.length; i++)
	{
		var arg = parts[i].split("=");
		get_contents[decodeURIComponent(arg[0])] = decodeURIComponent(arg[1]);
	}

	the_aid = get_contents['aid'];
	
	$.post("applications_list.php", {arg:"single", aid:the_aid, filter:"", search:""}, function(data) {
		
		for(var i = 0; i < data.applications.length; i++)
		{
			addApplication(data.applications[i]);
		}
		
	}, "json");

}

function addApplication(app)
{
	var aid = app.aid;
	var email = app.email;
	var fullname = app.fullname;
	var edu = app.edu;
	var track = app.track;
	var whoareyou = app.who;
	var linkedin = app.linkedin;
	var foot1 = app.foot1;
	var foot2 = app.foot2;
	var foot3 = app.foot3;
	var foot4 = app.foot4;
	var foot5 = app.foot5;
	var whybss = app.why;
	var proudof = app.proudof;
	var awesomehire = app.awesomehire;
	var anythingelse = app.other;
	
	var accepted = app.accepted;
	var rating = app.rating;
	
	var appDiv = $("<div>");
	appDiv.attr("id", "app_" + aid);
	appDiv.addClass("application");
	
	if(accepted == 1)
	{
		appDiv.addClass("accepted");
	}

	var appsDiv = $("div#applications");
	// add the entire student row to the table.
	
	var viewComments = $("<div>");
	viewComments.addClass("comments-toggle");
	viewComments.html("<br><a>Show comments &raquo;</a>");
	viewComments.attr("id", "viewcomments_" + aid);
	
	var comments = $("<div>");
	comments.addClass("comments");
	comments.attr("id", "comments_" + aid);
	comments.css("display", "none");
	
	for(var i = 0; i < app.comments.length; i++)
	{
		var comment_item = app.comments[i];
		if(!comment_item.commenttext)
		{
			continue;
		}
		var comment = $("<div>");
		comment.addClass("comment");
		comment.html('<b>' + comment_item.displayname + '</b> ' + comment_item.commenttext + '<div class="timestamp">' + comment_item.timestamp + '</div>');
		comments.append(comment);
	}
	
	var newcomment = $("<div>");
	newcomment.addClass("comment");
	newcomment.attr("id", "nc_" + aid);
	
	var ta = $("<textarea>");
	ta.addClass("span6");
	ta.attr("placeholder","Add a comment");
	ta.attr("id", "taid_" + aid);
	
	ta.focusin(function(event){
	
		$(this).attr("rows", "2");
		$(".postcomment").remove(); 
		
		var newCommentWrap = $("<div>");
		var addnewcomment = $("<a>");
		addnewcomment.addClass("btn");
		addnewcomment.addClass("btn-gray");
		addnewcomment.addClass("postcomment");
		addnewcomment.html('Add Comment');
		
		// new comment
		addnewcomment.click(function(event) {

			/* corresponds to nc; parent is nc, not ta */
			var this_ncid = $(this).parent().parent().attr("id");
			var this_aid = this_ncid.split("_")[1];
			
			var this_ta = $("textarea#taid_" + this_aid);
			
			$.post("comment_add.php", {aid:this_aid, newcommenttext:this_ta.val()}, function(data) {
			
				if (data.res == "fail")
				{
					// failure message
					alert(data.reason);
				}
				else
				{
					// add new comment to DOM
					thenewcomment = $("<div>");
					thenewcomment.addClass("comment");
					thenewcomment.html('<b>' + data.displayname + '</b> ' + data.commenttext + '<br><div class="timestamp">Moments ago...</div>');
					thenewcomment.css("display", "none");			
					
					$("div#comments_" + this_aid).append(thenewcomment);				
					$(".postcomment").slideUp(400, function() { 
						
						$(this).parent().parent().slideUp(400, function() {
							
							$(this).remove();
						
						}); 
						
						thenewcomment.slideDown(400); });
				}
				
			}, "json");
		
		});
		
		newCommentWrap.append(addnewcomment);
		
		$(this).parent().append(newCommentWrap);
	
	});
	
	ta.keypress(function(event) {
			
		code = (event.keyCode ? event.keyCode : event.which);
		if (code == 13 || code == 10)
		{
			$(".postcomment").click();
		}
		
	});
	
	ta.blur(function(event){

		if($(this).val() == "")
		{
			$(this).attr("rows", "1");
			$(".postcomment").remove(); 
		}

	});
	
	newcomment.append(ta);
			
	comments.append(newcomment);
	
	// on-click for the actual expanding/collapsing
	viewComments.click(function(event) {
	
		var this_id = $(this).attr("id");
		var this_aid = this_id.split("_")[1];	
	
		if($("div#comments_" + this_aid).css("display") == "none")
		{
			$(this).html("<br><a>&laquo; Hide comments</a>");
			$("div#comments_" + this_aid).slideDown(400);
		}
		else
		{
			$(this).html("<br><a>Show comments &raquo;</a>");
			$("div#comments_" + this_aid).slideUp(400);				
		}

	});
	
	var starRating = "";
	for(var j = 0; j < 5; j++)
	{
		if(j < rating)
			starRating += '<div style="float: left;"><i class="icon-star" /></div>';
		else
			starRating += '<div style="float: left;"><i class="icon-star-empty" /></div>';
	}
	
	if(track == "softwaredev")
	{
		track = "Software Development";
	}
	else if(track == "marketing")
	{
		track = "Marketing";
	}
	else if(track == "bizdevsales")
	{
		track = "Sales & Business Development";
	}
	else if(track == "productdesign")
	{
		track = "Product Design";
	}
	
	var appContents = $("<div>");
	appContents.attr("id", "appContents_" + aid);
	appContents.html(
					'<br><table><tr><td>' +						
						'<strong>Full name:</strong><br>' + fullname + 
						'<br><br>' +
						'<strong>Email address:</strong><br>' + email +
						'<br><br>' +
						'<strong>Education</strong><br>' + edu +
						'<br><br>' +
						'<strong>Track</strong><br>' + track +
						'<br><br>' +
						'<strong>Who are you?</strong><br>' + whoareyou +
						'<br><br>' +
						'<strong>LinkedIn:</strong><br>' + linkedin +
						'<br><br>' +
						'<strong>Social footprint:</strong><br>' + 
						'<a href="' + foot1 + '">' + foot1 + '</a><br>' +
						'<a href="' + foot2 + '">' + foot2 + '</a><br>' +
						'<a href="' + foot3 + '">' + foot3 + '</a><br>' +
						'<a href="' + foot4 + '">' + foot4 + '</a><br>' +
						'<a href="' + foot5 + '">' + foot5 + '</a><br>' +
						'<br>' +
						'<strong>Why Boston Startup School?</strong><br>' + whybss +
						'<br><br>' +
						'<strong>Something you are proud of / would not have happened without you:</strong><br>' + proudof +
						'<br><br>' +
						'<strong>Will be an awesome hire because:</strong><br>' + awesomehire +
						'<br><br>' +
						'<strong>Anything else:</strong><br>' + anythingelse +
					'</td></tr></table>');
	
	appContents.append(viewComments).append(comments);
	
	var appSpan = $("<span>");
	appSpan.addClass("appheader");
	appSpan.attr("id", "appSpan_" + aid);
	appSpan.html(fullname + ' (' + email + ') &mdash; ' + track);
	
	var appRating = $("<div>");
	appRating.html(starRating);
	
	
	appDiv.append(appSpan).append(appRating).append(appContents);	
	appsDiv.append(appDiv);	
}


