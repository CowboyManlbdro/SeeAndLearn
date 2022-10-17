<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Поиск курса</title>
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
	<h1>Вот, что удалось найти:</h1>
	<? 
$s=$_POST['search'];
$courses=Search($db,$s);
if (!empty($courses)){
foreach ($courses as $course) { 
	?>
	<a href="course.php?id=<?php echo $course['id_course'];?>"><h2><? echo $course ['course']; ?></h2></a>
<? } }
else echo "<h2>Ничего не найдено!</h2>"; ?>
         
</center>
</div>

<div id="clear">
	
</div>


</body>
</html>