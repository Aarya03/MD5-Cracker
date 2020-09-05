<!DOCTYPE html>
<head><title>Aaryavarat Joshi MD5 Cracker</title></head>
<body style="font-family: sans-serif;">
<h1>
	MD5 cracker
</h1>
<p>
	This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.
</p>
<pre>
Debug Output:
<?php
	$pin = "Not found";
	if(isset($_GET['md5']))
	{
		$time_pre = microtime(true);
	    $md5 = $_GET['md5'];
	    $show=15;
	    $checks=0;
	    $flag=true;
	    for($i=0;$i<=9&&$flag;$i++)
	    {
	    	for($j=0;$j<=9&&$flag;$j++)
	    	{
	    		for($k=0;$k<=9&&$flag;$k++)
	    		{
	    			for($l=0;$l<=9&&$flag;$l++)
	    			{
	    				$c1=strval($i);
	    				$c2=strval($j);
	    				$c3=strval($k);
	    				$c4=strval($l);
	    				$try=$c1.$c2.$c3.$c4;
	    				$check=hash('md5',$try);
	    				$checks++;
	    				if($check==$md5)
	    				{
	    					$pin=$try;
	    					$flag=false;
	    					break;
	    				}
	    				if($show>0)
		    			{
		    				print"$check $try\n";
		    				$show--;
		    			}
	    			}
	    		}
	    	}
	    }
	    print"Total Checks: $checks\n";
	    $time_post = microtime(true);
	    $totTime=$time_post-$time_pre;
	    print "Elapsed time: $totTime\n";
	}
?>
</pre>
<p>PIN: <?= htmlentities($pin); ?></p>
<form>
<input type="text" name="md5" size="40" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
	<li><a href="index.php">Reset This Page</a></li>
	<li><a href="makepin.php">Make an MD5 PIN</a></li>
	<li><a href="md5.php">MD5 Encoder</a></li>
</ul>
</body>
</html>