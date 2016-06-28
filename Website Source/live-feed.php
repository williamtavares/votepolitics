<?php error_reporting(0); ?>
<?php include('header.php'); ?>
<div id="content-live-feed">
	<div id="select-candidate">
		<span>
			<p>Choose a candidate to see their Twitter and Top Google News feed: </p>
		</span>
		<select id="candidate-list">
			<option value="blank"></option>
		</select>
	</div>
	<div id="live-feed">
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
	FROM ".$databname.".politicians_tbl
	ORDER BY politician_name ASC";

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
		$politician_status_selector = str_replace(' ', '-', $row->running_status);
		$politician_votes = $row->total_votes;
		$portrait_image = $row->portrait_url;
		$wiki_link = $row->wikipedia_url;
		$source = $row->photo_source;
		$twitter_id = $row->twitter_data_id;
		$google_query = $row->google_news_query;

		echo
		'<option class="'.$politician_party.'-option"  value="'.$politician_id.'">'.$politician_display_name.'</option>';
	}


	mysqli_close($connection);
?>
<?php include('footer.php'); ?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="js/myscript.js"></script>
</body>
</html>
