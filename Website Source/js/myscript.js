$( document ).ready(function() {
// 	if (($(window).width() < 1199)){
// 				window.location = "http://m.votepolitics.us"
// 		};
//
// 	$(window).resize(function() {
// 		if (($(window).width() < 1199)){
// 			window.location = "http://m.votepolitics.us"
// 		};
// 	});

	$(".DemocraticCandidate:contains(Running)").appendTo("#democratic-running");
	$(".DemocraticCandidate:not(:contains(Running))").appendTo("#democratic-notrunning");
	$(".RepublicanCandidate:contains(Running)").appendTo("#republican-running");
	$(".RepublicanCandidate:not(:contains(Running))").appendTo("#republican-notrunning");
	$(".Democratic-option").appendTo("#candidate-list");
	$(".Republican-option").appendTo("#candidate-list");

	$(".candidate-container").click( function(event){
        event.stopPropagation();
        $(this).find(".candidate-wiki").toggle();
		$(".lights-out").fadeIn(400, function(){
			$(".lights-out").show();
		});
	});

	$("#candidate-list").change(function() {
		selectedCandidate = $('option:selected', this).val();
		getFeeds(selectedCandidate);
    });

    $(document).click( function(){
        $(this).find(".candidate-wiki").hide();
		$(".lights-out").fadeOut(400, function(){
			$(this).hide();
		});
	});

	if(checkCookie() == true){
		$("#recaptcha").hide();
		getPercentageAll();
	}

});

	var recaptcha;
	var responsePhrase = "";
    var myCallBack = function() {
        recaptcha = grecaptcha.render('recaptcha', {
          'sitekey' : '',
          'theme' : 'light',
		  'callback' : function(response) {

		  responsePhrase = response;
        }
      });
    };

function updateVote(str){
	if(checkCookie() == false){
		if(responsePhrase != ""){
			$.get("vote.php", {name: str, recaptchaResponse: responsePhrase}, function(data){
				if(data == 'true'){
					$("#recaptcha").hide();
					getPercentageAll();
				}
				else {
					document.location.href = "error.php";
				}
			});
		}else{
			alert("Please Verify that you NOT a robot by selecting the checkbox :)\n\nIf you don't see the checkbox please refresh the page");
		}
	} else {
		alert("You have already voted! \nCome back in 7 days to vote again :)");
	}
}

function getPercentageAll(){
	$.post("showpercentage.php",function(data){
			$("#vote-results").html(data);
			$("#vote-results").css({
				"background-color":"#222",
				"box-shadow":"inset -1px 0px 4px 1px rgb(61, 61, 61)"
			});
			$("#content").css("padding-top","0px");
			$("#vote-results").slideDown(500);
	});
}
var selectedCandidate;

function getFeeds(str){
	$.get("feed.php", {id: str}, function(data){
	selectedCandidate =  str;
			$("#live-feed").html(data);
	});
}



function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function checkCookie() {
    var vote = getCookie("vote-cast");
    if (vote != "") {
		return true;
    } else {
		return false;
    }
}
