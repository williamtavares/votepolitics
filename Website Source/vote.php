<?php
	//error_reporting(0);
	include('config/vp_dbconfig.inc');
	require_once('autoload.php');

	/*Logging query*/
	$error_query = "INSERT INTO votepolitics.log_tbl (message,time_stamp) VALUES (?, NOW())";

	$siteKey = '';
	$secret = '';

	if($_GET['recaptchaResponse'] != "" && $_GET['name'] != ""){

		$recaptcha = new \ReCaptcha\ReCaptcha($secret);
		$resp = $recaptcha->verify($_GET['recaptchaResponse'], $_SERVER['REMOTE_ADDR']);

		if ($resp->isSuccess()){

			$connection = mysqli_connect($dbhost,$dbuser,$dbpass);

			if (!$connection){
				die();
				exit;
			}

			mysqli_select_db($connection, $databname);

			//Check if the cookie is already set, if not do not let the vote go through.

			if(!isset($_COOKIE["vote-cast"])) {
				$cookie_name = "vote-cast";
				$cookie_value = "voted";
				setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/", "votepolitics.us"); // 86400 = 1 day*/

			//Check if user has already voted if so then skip updating database

			$query =
			"UPDATE votes_tbl, politicians_tbl
			SET votes_tbl.total_votes = votes_tbl.total_votes + 1
			WHERE  votes_tbl.politician_id = politicians_tbl.politician_id AND politicians_tbl.politician_name LIKE ?";

			$stmt = mysqli_prepare($connection, $query);

			mysqli_stmt_bind_param($stmt, "s", $final_name);

			$final_name = str_replace('-', ' ', $_GET['name']);

			mysqli_stmt_execute($stmt);

			mysqli_stmt_close($stmt);

			echo 'true';
			} else {
				$_COOKIE["vote-cast"];
			}
		} else {
			$connection = mysqli_connect($dbhost,$dbuser,$dbpass);

            foreach ($resp->getErrorCodes() as $code) {
				$error_stmt = mysqli_prepare($connection, $error_query);
				mysqli_stmt_bind_param($error_stmt, "s", $error_message);
				$error_message = "Recaptcha_Error: ".$code;
				mysqli_stmt_execute($error_stmt);
				mysqli_stmt_close($error_stmt);
            }
			header('Location: error.php');
			die();
		}
	} else {
		header('Location: error.php');
		die();
	}

	mysqli_close($connection);
?>
