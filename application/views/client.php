<!DOCTYPE html>
<html>
<head>
	<title>403 Forbidden</title>
</head>
<body>

<p>Directory client </p>

<img src="<?php echo(donnerImage().'gg.jpg') ?>">
<?php  echo(donnerImage().'gg.jpg')  ?>
<?php
	foreach ($dataClient as $row) {
				var_dump ($row['name']."  ".$row['userName']);
			}
?>

</body>
</html>
