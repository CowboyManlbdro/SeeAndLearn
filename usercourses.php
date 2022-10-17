<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Мои курсы</title>
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
	<h1>Мои курсы</h1>

	<? 
        $id_c=getIdCourseBySubscriber($db,$_SESSION['user']);

        foreach ($id_c as $id) { 

        $courses=getCourseById($db,$id['id_sub']);

?>
              <a href="course.php?id=<?php echo $courses['id_course'];?>"><h2><? echo $courses ['course']; ?></h2></a> 
              <?
           
          }
	?>

</div>

<div id="clear">
	
</div>


</body>
</html>