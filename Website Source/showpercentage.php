<?php
		error_reporting(0);
		include('config/vp_dbconfig.inc');
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass);
		if (mysqli_connect_errno()){ 
				header('Location: error.php');
				die();
		}
		
		mysqli_select_db($connection, $databname);
		
		$all_total_politicians = 
		"SELECT SUM(votes_tbl.total_votes) AS Total_Votes
		FROM ".$databname.".politicians_tbl, ".$databname.".votes_tbl
		WHERE votes_tbl.politician_id = politicians_tbl.politician_id AND politicians_tbl.politician_party LIKE '%Democratic%'";
		
		$result2 = mysqli_query($connection, $all_total_politicians);
		
		$row2=mysqli_fetch_object($result2);
		
		$total_votes_all = $row2->Total_Votes;
		
		//Get the voted on politician's vote amount
		$query3 = 
		"SELECT politician_name, votes_tbl.total_votes
		FROM ".$databname.".politicians_tbl, ".$databname.".votes_tbl
		WHERE votes_tbl.politician_id = politicians_tbl.politician_id AND politicians_tbl.politician_party LIKE '%Democratic%'
		ORDER BY total_votes DESC, politician_name ASC";
		
		/*ORDER BY running_status DESC, politician_name ASC*/
		
		$result3 = mysqli_query($connection, $query3);
		
		$color = "rgb(0, 0, 221)";

		echo '<div id="left-results"><ul>';
		while ($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
			if($total_votes_all > 0){
				$vote_percentage = ($row['total_votes']/$total_votes_all)*100;
			} else {
				$vote_percentage = 0;
			}
			echo '<li style="height: 20px; line-height: 20px; margin-bottom: 5px; width: 315px;">'
			.'<p style="width: 150px; float: left;">'.$row['politician_name'].'</p>'
			
			.'<p class="results-graph" style="width:'.round($vote_percentage,2).'px; background-color:'.$color.';"></p>'
			
			.'<p style="float: left;">'.round($vote_percentage,2).'%</p>'
			
			.'</li>';
		}
		echo '</ul></div>';
		
		$all_other_total_politicians = 
		"SELECT SUM(votes_tbl.total_votes) AS Total_Votes
		FROM ".$databname.".politicians_tbl, ".$databname.".votes_tbl
		WHERE votes_tbl.politician_id = politicians_tbl.politician_id AND politicians_tbl.politician_party LIKE '%Republican%'";
		
		$result4 = mysqli_query($connection, $all_other_total_politicians);
		
		$row3=mysqli_fetch_object($result4);
		
		$other_total_votes_all = $row3->Total_Votes;
		
		//Get the voted on politician's vote amount
		$query4 = 
		"SELECT politician_name, votes_tbl.total_votes
		FROM ".$databname.".politicians_tbl, ".$databname.".votes_tbl
		WHERE votes_tbl.politician_id = politicians_tbl.politician_id AND politicians_tbl.politician_party LIKE '%Republican%'
		ORDER BY total_votes DESC, politician_name ASC";
		
		/*ORDER BY running_status DESC, politician_name ASC*/
		
		$result5 = mysqli_query($connection, $query4);
		
		$color = "rgb(221, 0, 0)";
			
		echo '<div id="right-results"><ul>';
		while ($row = mysqli_fetch_array($result5, MYSQLI_ASSOC)) {
			
			if($other_total_votes_all > 0){
				$vote_percentage = ($row['total_votes']/$other_total_votes_all)*100;
			} else {
				$vote_percentage = 0;
			}
			echo '<li style="height: 20px; line-height: 20px; margin-bottom: 5px; width: 315px;">'
			.'<p style="width: 150px; float: left;">'.$row['politician_name'].'</p>'
			
			.'<p class="results-graph" style="width:'.round($vote_percentage,2).'px; background-color:'.$color.';"></p>'
			
			.'<p style="float: left;">'.round($vote_percentage,2).'%</p>'
			
			.'</li>';
		}
		echo '</ul></div>';
		
		$both_parties_total_votes = $total_votes_all+$other_total_votes_all;
		
		echo '<div id="number-of-votes"><p>'.$both_parties_total_votes.' Votes</p></div>';
		
		mysqli_close($connection);
?>