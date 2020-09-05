<?php
$error = false;
$md5 = false;
$pin = "";
if ( isset($_GET['code']) ) {
    $pin = $_GET['code'];
    if(strlen($pin)!=4)
    	$error="Input must be exactly four characters";
    else if($pin[0] < "0" || $pin[0] > "9" || $pin[1] < "0" || $pin[1] > "9"
    || $pin[2] < "0" || $pin[2] > "9"|| $pin[3] < "0" || $pin[3] > "9")
    	$error="Input must have digits only";
    else
    	$md5=hash('md5', $pin);
}
?>
<!DOCTYPE html>
<head><title>Aaryavarat Joshi PIN Code</title></head>
<body>
<h1>MD5 PIN Maker</h1>
<?php
if ( $error !== false ) {
    print '<p style="color:red">';
    print htmlentities($error);
    print "</p>\n";
}

if ( $md5 !== false ) {
    print "<p>MD5 value: ".htmlentities($md5)."</p>";
}
?>
<p>Please enter a four digit pin for encoding.</p>
<form>
<input type="text" name="code" value="<?= htmlentities($pin) ?>"/>
<input type="submit" value="Compute MD5 for CODE"/>
</form>
<ul>
	<li><a href="makepin.php">Reset</a></li>
	<li><a href="index.php">Back to Cracking</a></li>
</ul>
</body>
</html>