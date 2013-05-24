<?php
	/*
	$dt=date("d/m/y");
	$tm=date("H:i:s");
	$spamtime=mktime(date("H")-1, date("i"), date("s"),0,0,0);
	$result=mysql_query("select count(suggestion) ct from suggestions where date='$dt' and time > '$spamtime") or die(mysql_error()." Line 12");
	$myrow=mysql_fetch_array($result);
	if($myrow['ct'] > 200)
	header("location:suggestions.php?msg=Spam threat detected. Please resubmit after sometime");
	*/
	//$result=mysql_query("select max(comment_id) cid from suggestions") or die(mysql_error());
	//$myrow = mysql_fetch_array($result);
	
	//$cid = $myrow['cid'] + 1;
	$date=date("y/m/d");
	$time=date("H:i:s");
	$suggestion=$_POST['comment'];
	$name=$_POST['name'];
					//echo $suggestion;
    // open file
    $fw = fopen("comments.txt", 'a');
    fwrite($fw, "<font color=red>$name says: </font>".$suggestion."<br/>") or die('Could not write');

					
	header("location:suggestion_box.php?tk=1");
	//echo $username." ".$suggestion." ".$date." ".$time."<br/>";
	//echo $suggestion;
/*	if(get_magic_quotes_gpc())
	echo "enabled";
	else
	echo "disabled";*/
?>
