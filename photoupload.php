<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Загрузка фото</title>
<link rel="stylesheet" type="text/css" href="css/nice.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div id="list">

</div>

<div id="header" >
<?php include ('header.php'); ?>
   				
</div>



<div id="cen">
<center>	
	<h1>Загрузить фотографию</h1>
<form method="post" action="photo\photoload.php" enctype="multipart/form-data">
<input type="file" id="inputfile" name="inputfile"></br>
<input type="submit" value="Загрузить">
</center>

</div>

<div id="clear">
	
</div>


</body>
</html>