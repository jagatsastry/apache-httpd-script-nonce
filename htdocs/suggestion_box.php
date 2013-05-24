<?php
header("Content-Security-Policy: script-nonce noncynonce");
header("Cache-Control: no-cache, must-revalidate");
?>
<title>Ironic Securities Pvt. Ltd</title>
<!--Author: Jagat Sastry P. Stony Brook-->
<?php
    $msg=$_GET['tk'];
    if($msg) 
    echo "Thanks for the comment!<br/>"
?>

<center><font color="blue"><h1>Ironic Securities Pvt. Ltd</h1></font><center>
<center><font color="red"><h3><i>--Doing rubber-hose cryptanalysis since 1914</i></h3></font><center>
<h3><center>Comment please. Your feedback is invaluable to us.</center></h3>


<div id="comment-form" align=center>

<form id="commentform" method="post" action="sug_proc.php">

<input type="text" name="name" id="name" value="Anon"></input>Name


<p><textarea tabindex="4" rows="5" cols="53" style="background-color:#bbddff;" id="comment" name="comment"></textarea></p>

<p><center><input type="submit" value="Go!" tabindex="5" id="submit" name="submit"/></center>
</p>

</form>
<h1>User Comments</h1>
<?php
    $fh = fopen("comments.txt", 'r') or die('Could not open file!');
    $data = fread($fh, filesize("comments.txt")) or die('Could not read file!');

    fclose($fh);
    echo $data;
?>

</div>	
