<?php
	error_reporting(0);
	include('config/vp_dbconfig.inc');
	$connection = mysqli_connect($dbhost,$dbuser,$dbpass);
	if (mysqli_connect_errno()){ 
		header('Location: error.php');
		die();
	}
	
	mysqli_select_db($connection, $databname);
	
	$id = $_GET['id'];
	
	if($stmt = $connection->prepare("SELECT politicians_tbl.twitter_data_id, politicians_tbl.google_news_query
	FROM ".$databname.".politicians_tbl 
	WHERE politicians_tbl.politician_id LIKE ?")){
		
		// Bind a variable to the parameter as a string. 
		$stmt->bind_param("i", $id);
		
		// Execute the statement.
		$stmt->execute();
		
		// Get the variables from the query.
		$stmt->bind_result($twitter_id , $google_query);
		
		// Fetch the data.
		$stmt->fetch();
		
		// Display the data.
		//printf("Twitter id for %s is %s\n", $id, $twitter);
		
		echo '
		<div id="twitter-feed">
		<iframe src="twitter-feed.php?id='.urlencode($twitter_id).'"></iframe>
		</div>';
		
		//This will return the Google feed page that is rendered and then that page is inserted into an iframe
		echo '
		<div id="news-feed">
		<iframe src="google-feed.php?str='.urlencode($google_query).'"></iframe>
		</div>';
		
		// Close the prepared statement.
		$stmt->close();
	}
?>


<?php
	
	mysqli_close($connection);
?>