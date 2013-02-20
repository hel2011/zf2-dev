<?php 
session_start();
echo "<strong>Testing PHP session timeout code here</strong>";
var_dump($_SESSION);

testSession();




function testSession(){
	$inactivityTime = 30;//number of seconds for website timeout
	//$interval = date_diff (time(),$_SESSION['LAST_ACTIVITY'], false);//return dateinterval
	 //var_dump ($interval);
	echo "inactivity set to " . $inactivityTime . "<br>";
	 $start_date = new DateTime();
	 echo "<br>";
	 print_r ($start_date);
	 $since_start = $start_date->diff($_SESSION['LAST_ACTIVITY']);
	 echo "<br>";
	 //echo $since_start->days.' days total<br>';
	 //echo $since_start->y.' years<br>';
	 //echo $since_start->m.' months<br>';
	 //echo $since_start->d.' days<br>';
	 //echo $since_start->h.' hours<br>';
	 //echo $since_start->i.' minutes<br>';
	 echo $since_start->s.' seconds<br>';	 
	 
	if (isset($_SESSION['LAST_ACTIVITY']) == false){
		//user is not logged in
		echo "you are NOT logged in.<br>";
	}else if (isset($_SESSION['LAST_ACTIVITY']) && ($since_start->s > $inactivityTime)) {
		// last request was more than 30 minutes ago
		echo 'last active pages was ' . $since_start->s . " seconds ago";
		session_unset();     // unset $_SESSION variable for the run-time
		session_destroy();   // destroy session data in storage
		echo 'Destroyed session ';
		
	}
	else{
		echo "you ARE logged in";
		$_SESSION['LAST_ACTIVITY'] = new DateTime();// update last activity time stamp
		echo 'Keep session going since last active pages was ' . $since_start->s . " seconds ago";
	}

}

?>
 
 </body>
</html>

