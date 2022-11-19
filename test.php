<h1>TIME</h1>


<?php
//print todays date
echo "Today is ". date("l") . " ". date("Y-m-d") . "<br>";

//set timezone 
//ideally, when we connect to database the time should set automatically
date_default_timezone_set("America/Edmonton");

//var to store current hours in 24hr fomat 
$currTime = date("H");
$currentDay;
//manual input time for testing 
// $currTime = 15;


//assume there is: Day, afternoon, night and midnight.
if ( ($currTime > 7)  && ($currTime <= 14) ){
	echo "The time is " . date("h:i:sa").  "<br>";
	echo "Have a good day";
	$currentDay = "Day";
};

if ( ($currTime > 14)  && ($currTime <= 19) ){
	echo "The time is " . date("h:i:sa").  "<br>";
	echo "Have a good afternoon";
	$currentDay = "Afternoon";
};

if ( ($currTime > 19)  && ($currTime <= 23) ){
	echo "The time is " . date("h:i:sa").  "<br>";
	echo "Have a good night";
	$currentDay = "Night";
};

if ( ($currTime > 23)  || ($currTime <= 7) ){
	echo "The time is " . date("h:i:sa").  "<br>";
	echo "it is literally midnight, the sun is not out yet go to sleep ";
	$currentDay = "Midnight";
};


echo "<br>" . $currentDay. "<br>";




?>

