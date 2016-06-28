<?php error_reporting(0); ?>
<?php include('header.php'); ?>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1592048154407887";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		<div id="left-sidebar">
		</div>
		<div id="right-sidebar">
			<div class="fb-comments" data-href="www.votepolitics.us" data-numposts="8" data-colorscheme="light"></div>
		</div>
		<div id="content">
			<div id="recaptcha" class="g-recaptcha" data-sitekey="" style="margin: 0 auto;"></div>
			<div id="vote-results">
			</div>
			<div id="name-header">
			<h3>2016 Presidential Candidates</h3>
			</div>
			<div id="democratic-candidates">
			<h3 style="color: rgb(253, 253, 253); background-color: rgb(0, 0, 221);
					   border: 1px solid rgb(218, 218, 218);
					    margin-left: 1px;">Democrats</h3>
			<div id="democratic-running">
				<div class="status">
				<p>Running</p>
				<!--<hr></hr>-->
				</div>
			</div>
			<div id="democratic-notrunning">
				<div class="status">
				<p>Out of Race</p>
				<!--<hr></hr>-->
				</div>
			</div>
			</div>
			<div id="republican-candidates">
			<h3 style="color: rgb(253, 253, 253); background-color: rgb(221, 0, 0);
					   border: 1px solid rgb(218, 218, 218);
					   margin-right: 1px;">Republicans</h3>
			<div id="republican-running">
				<div class="status">
				<p>Running</p>
				</div>
			</div>
				<div id="republican-notrunning">
					<div class="status">
					<p>Out of Race</p>
					</div>
				</div>

			</div>
			<div class="lights-out">
			</div>
		</div>
	<?php
		include('config/vp_dbconfig.inc');
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass);
		if (mysqli_connect_errno()){
			header('Location: error.php');
			die();
		}

		mysqli_select_db($connection, $databname);

		$query =
		"SELECT *
		FROM ".$databname.".politicians_tbl, ".$databname.".votes_tbl
		WHERE votes_tbl.politician_id = politicians_tbl.politician_id
		ORDER BY running_status DESC, politician_name ASC";

		$result = mysqli_query($connection, $query);

		$dirname = "photos/";

		while($row=mysqli_fetch_object($result))
		{

			$politician_id = $row->politician_id;
			$politician_party = $row->politician_party;
			$politician_display_name = $row->politician_name;
			//Replace blank space with dash for easy front end manipulation
			$politician_name_1 = str_replace(' ', '-', $row->politician_name);
			//Replace any apostrophe with \' to prevent errors
			$politician_name_identifier = str_replace("'", "\'", $politician_name_1);
			$politician_status = $row->running_status;
			$politician_votes = $row->total_votes;
			$portrait_image = $row->portrait_url;
			$wiki_link = $row->wikipedia_url;
			$source = $row->photo_source;

			echo
			'<div class="'.$politician_party.'Candidate">'.
				'<div class="candidate-container" id="'.$politician_id.'">'.
					'<h2>'.$politician_display_name.'</h2>'.
					'<div class="candidate-photo">'.
					'<img src="'.$dirname.$portrait_image.'" height="130" width="130">'.
					'</div>'.
					'<div>'.
					'<p class="photo-source">'.$source.'</p>'.
					'</div>'.
					'<div class="running-status">'.
						'<p>'.$politician_status.'</p>'.
					'</div>';

			echo
					'<div class="candidate-wiki">'.
						'<object data="'.$wiki_link.'"></object>'.
					'</div>'.
				'</div>'; // end of candidate container
			echo
			'<form action="">'.
				'<span id="'.$politician_id.'"></span>'.
				'<button class="vote-button" type="button" value="'.$politician_name_identifier.'" onclick="updateVote(this.value)">Vote</button>'.
			'</form>'.
			'</div>'; //end of main candidate

		}


		mysqli_close($connection);
	?>
	<script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="js/myscript.js"></script>
	</body>
</html>
