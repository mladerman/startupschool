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
			
    showApplications();
	
	$.post("get_all_tags.php", function(data) {
	
		alltags = data.tags;
		$("input#longsearch").autocomplete(alltags);
			
	}, "json");
	
	$("div#scrolltotop").click(function(event) {
	
		$("html, body").animate({ scrollTop: 0 }, 1500);
		return false;
	
	});
	
	
	$("select#sortby").change(function(event) {
	
		clearApplications("filter");
	
	});
	
	$("select#tagsdd").change(function(event) {
	
		$("div#tagfiltermenu").slideUp(400);
		clearApplications("filter");
	
	});
	
	$("a#searchsubmit").click(function(event) {
	
		clearApplications("search");
		
	});
	
	$("select#searchby").change(function(event) {
	
		clearApplications("search");
	
	});
	
	$("a.searchtoggle").click(function(event) { togglesearch(); } );
	
});

function togglesearch()
{
	var filterMenu = $("div#filter");
	var searchMenu = $("div#search");
	
	if(searchMenu.css("display") == "none")
	{
		filterMenu.fadeOut(400, function() { filterMenu.css("display", "none"); searchMenu.fadeIn(400); });
	}
	else
	{
		searchMenu.fadeOut(400, function() { searchMenu.css("display", "none"); filterMenu.fadeIn(400); });
	}
}

function clearApplications(how)
{
	showhow = how;
	$("div#applications").html("");
	showApplications();
	
	$("div#currfilters").html("");
	var clearFilters = $("<div>");
	clearFilters.html('[<a>Reset</a>]');
	
	clearFilters.click(function(event) {
	
		showhow = "public";
		$("div#applications").html("");
		
		showApplications();
		
		$(this).slideUp(400, function() { $("div#currfilters").html(""); });
		$("#sortby").val($("#sortby option:first").val());
		$("#tagsdd").val($("#tagsdd option:first").val());
		$("searchby").val($("#searchby option:first").val());
		$("input#longsearch").val("");
		$("div#tagfiltermenu").slideUp(400);
		$("div#showbuttondiv").slideUp(400);
	
	});
	
	$("div#currfilters").append(clearFilters);
}

function showApplications()
{
	var filter_name = $("select#sortby").children(":selected").attr("id");
	var search_name = $("select#tagsdd").children(":selected").attr("id");
	
	if(showhow == "search")
	{
		search_name = $("input#longsearch").val();
		filter_name = $("select#searchby").children(":selected").attr("id");
	}
	
	if(showhow == "filter" && search_name == "MORE")
	{
		toggleTagMenu();
	}
	
	if(showhow == "tagfilter" && search_name == "MORE")
	{
		search_name = clickedTag;
		showhow = "filter";
	}
	
	$.post("applications_list.php", {arg:showhow, aid:globalaid, filter:filter_name, search:search_name}, function(data) {
		
		for(var i = 0; i < data.applications.length; i++)
		{
			addApplication(data.applications[i]);
		}
		
	}, "json");

}

function toggleTagMenu()
{
	if(!tagMenu)
	{
		var showbuttondiv = $("<div>");
		showbuttondiv.attr("id", "showbuttondiv");
		showbuttondiv.html('[<a class="smalltext searchlink">Show tags</>]');
		showbuttondiv.css("display", "none");
		showbuttondiv.click(function(event) {
		
			$(this).slideUp(400, function() {
		
				$("div#tagfiltermenu").slideDown(400);
		
			});
		});
		
		
		tagMenu = $("<div>");
		tagMenu.attr("id", "tagfiltermenu");
		var hideSpan;
		for(var t = 0; t < alltags.length; t++)
		{
			if(alltags[t] == "")
			{
				continue;
			}
			var newTag = $("<input>");
			newTag.attr("type", "submit");
			newTag.attr("value", alltags[t]);
			newTag.attr("id", "tag_" + alltags[t]);
			newTag.addClass("tagfilterbutton");
			
			newTag.click(function(event) {
			
				clickedTag = $(this).val();
				clearApplications("tagfilter");
			
			});
			
			tagMenu.append(newTag);
		}
		hideSpan = $("<span>");
		hideSpan.html('  <a class="smalltext searchlink">Hide...</a>');
		hideSpan.click(function(event) {
		
			$(this).parent().slideUp(400, function() {
			
				$("div#showbuttondiv").slideDown(400);
			
			});
		
		});
		tagMenu.append(hideSpan);
		tagMenu.css("display", "none");
		$("div#filter").append(showbuttondiv);
		$("div#filter").append(tagMenu);
		tagMenu.slideDown(400);
	}
	else
	{
		$("div#showbuttondiv").slideUp(400, function() {
		
			$("div#tagfiltermenu").slideDown(400);
		
		});
	}
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
	appContents.css("display", "none");
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
						'<br><hr><a href="applications_view.php?aid=' + aid + '">View this application on its own page &raquo;</a>' +
					'</td></tr></table>');
	
	appContents.append(viewComments).append(comments);
	
	var appSpan = $("<span>");
	appSpan.addClass("appheader");
	appSpan.attr("id", "appSpan_" + aid);
	appSpan.html(fullname + ' (' + email + ') &mdash; ' + track);
	
	var appRating = $("<div>");
	appRating.html(starRating);
	
	appSpan.click(function(event) {

		var this_id = $(this).attr("id");
		var this_aid = this_id.split("_")[1];
	
		if($("div#appContents_" + this_aid).css("display") == "none")
		{
			$("div#appContents_" + this_aid).slideDown(); 
		}
		else
		{
			$("div#appContents_" + this_aid).slideUp();
		}
	
	});
	
	
	appDiv.append(appSpan).append(appRating).append(appContents);	
	appsDiv.append(appDiv);	
}


