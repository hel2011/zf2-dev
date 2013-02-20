<?php 
/*
 * This simple website timeout session is working.
* 1. Use session-start.php to start the session
* 2. Keep reloading session-main.php at various intervals to see the timer going.
* 3. Wait $inactivityTime seconds to pass before reloading to timeout the site.
* 4. The session data is destroyed or set to null.
* 5. In effect, the user has been timed out of the webpage based on inactivity of requesting pages.
*/

session_start();
echo "<strong>Testing PHP session timeout code here</strong>";
var_dump($_SESSION);

testSession();




function testSession(){
	$inactivityTime = 15;//number of seconds for website timeout
	//$interval = date_diff (time(),$_SESSION['LAST_ACTIVITY'], false);//return dateinterval
	 //var_dump ($interval);
	echo "inactivity set to " . $inactivityTime . "<br>";
	 $start_date = new DateTime();
	 echo "<br>";
	 print_r ($start_date);
	 //check if session data is there - check for last_activity and that it is not null
	 
	 if (isset($_SESSION['LAST_ACTIVITY']) && ($_SESSION['LAST_ACTIVITY'] != null ) ) {
	 	//check session info
	 	
	 	$since_start = $start_date->diff($_SESSION['LAST_ACTIVITY']);
	 	echo "<br>";
	 	//echo $since_start->days.' days total<br>';
	 	//echo $since_start->y.' years<br>';
	 	//echo $since_start->m.' months<br>';
	 	//echo $since_start->d.' days<br>';
	 	//echo $since_start->h.' hours<br>';
	 	//echo $since_start->i.' minutes<br>';
	 	echo $since_start->s.' seconds<br>';	 

	 	//check if we should timeout the website login.
	 	if ( ($since_start->s > $inactivityTime)) {
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
	else{
		//user is not logged in
		echo "you are NOT logged in.<br>";
		
	}
	 
	 

}

?>
 
 </body>
</html>

