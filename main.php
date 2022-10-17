<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Смотри и Учись!</title>
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

	

<?  if(!empty($_SESSION)){ 
	if($_SESSION['type']=='stud'){
	$user=getStudent($db,$_SESSION['user']);}
	else {$user=getTeacher($db,$_SESSION['user']);}
	?> 
	<h1>Рады вас снова видеть,<? echo $user['i'];?>  <?echo $user['o']; ?></h1>
	<? if ($_SESSION['type']=='teach') { ?>
<button class="btn btn-primary btn-sm"  onclick="window.location.href='newcourse.php'"><h2>Создать курс</h2></button>	
 
<? } ?>

	<?
        $id_c=getIdCourseBySubscriber($db,$_SESSION['user']);
        
        foreach ($id_c as $id) { 

        $courses=getCourseById($db,$id['id_sub']);
        getPlusForLent($db,$courses['course']);
    }
        $videos=getVideoByCourseSort($db);
        getClearForLent($db);

        if (!empty($videos)){ 

        	echo "<h1>Лента ваших подписок</h1>";
        	
        foreach ($videos as $video) { 
        	$course=getCourseByVideo($db,$video['course']);
?>

<p>
<h2>В курс <a href="course.php?id=<?php echo $course['id_course'];?>"><? echo $course['course']?></a> добалено видео:</h2>
              <video width="400" height="300" controls="controls" onclick="window.location.href='video.php?id=<?php echo $video['id_video'];?>'">
 <source src="<?=$video['file']?>" >
</video>
<h2><? echo $video['name']?></h2>
<h2>Автор:<? echo $video['author']?></h2>
<h2>Дата: <? echo $video['date_v']?></h2></td>
              <?
           }
          }
      }
      else { ?>
     <h1>Здравствуй, юный падаван</h1>
     <h1>На нашем сайте ты можешь найти интересующий тебя курс</h1>
     <h1>подписаться на него</h1>
     <h1>и стать мастером джедаем в выбранной тобой теме</h1>
     <h1>по видео</h1>
     <h1>но для начала твоего пути зарегистрируйся!</h1>
     <h1>Да пребудет с тобой сила ума!</h1>



     <? }
	?>
         
</center>
</div>

<div id="clear">
	
</div>


</body>
</html>