<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Form Data</title>
</head>
<body>

<h1>Raw Form Data</h1>
<pre>
<?php
   print_r($_POST);  // this prints the associative array for debugging
?>
</pre>

<!-- Extract each form item from posted data -->

<h1>Form input values</h1>
<p>Your Name: <?php print $_POST["visitor_name"] ?></p>
<p>Password: <?php print $_POST["password"] ?></p>
<p>License accepted: 
<?php 
if(isset($_POST["licenseOK"]))
	print $_POST["licenseOK"];
else
	print "false";
?></p>
<p>Account type: <?php print $_POST["account_type"] ?></p>
<p>Options: <?php 
    foreach($_POST["options"] as $key=>$val)
    {
        print "$val, ";
    }
?> </p>
<p>Operating system: <?php print $_POST["system"] ?></p>
<p>Remarks: <?php print $_POST["remarks"] ?></p>

<!-- Run thru all elements of the array of posted data -->

<h1>All Form Data</h1>

<?php
    foreach($_POST as $key=>$val)
    {
		if(!(is_array($val))){
			print ("<p>$key = $val\n</p>");
		}else{
			print ("<p>$key = ");
			foreach($val as $child_key=>$child_val){
				print (" $child_val, ");
			}
		}
    }
?>

</body>
</html>
