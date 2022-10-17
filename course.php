<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Курс</title>
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
<?php 
     $id= $_GET['id'];
      if ($id){
          $course= getCourseById($db, $id);
       } else {
         echo "<h1>Ошибка</h1>";
         exit ();
       }
      ?>
      <h1><? echo $course['course'];  ?></h1>
      <h1>Описание курса : <? echo $course['description'];  ?></h1>
      <h1> Подписчиков:<? echo $course['subscribes'];  ?></h1>
        <? if (($_SESSION['type']=='teach')&&($_SESSION['user']==$course['author'])) { ?>
<button class="btn btn-primary btn-sm"  onclick="window.location.href='fileupload.php?id=<?php echo $course['id_course'];?>'"><h2>добавить файл</h2></button> 

<button class="btn btn-danger btn-sm"  onclick="window.location.href='delcourse.php?id=<?php echo $course['id_course'];?>#zatemnenie'"><h2>Удалить курс</h2></button> 

<button class="btn btn-success btn-sm"  onclick="window.location.href='editcourse.php?id=<?php echo $course['id_course'];?>'"><h2>Изменить</h2></button> 
 
<? } 

        else {
         if (SubscribeOrNot($db,$id,$_SESSION['user'])){
        
        ?>
        <button class="btn btn-danger btn-sm"  onclick="window.location.href='desub.php?id=<?php echo $course['id_course'];?>#zatemnenie'"><h2>Отписаться</h2></button> 
      <? } else { ?>
             <button class="btn btn-success btn-sm"  onclick="window.location.href='subscribe.php?id=<?php echo $course['id_course'];?>#zatemnenie'"><h2>Подписаться</h2></button> 
             <?php }
           }
             $videos= getVideoByCourse($db, $course['course']);
          ?>  <table border="3" bordercolor="#5f99c8"><tr> <?
$kol=0;
foreach ($videos as $video) {
  if ($kol%3==0){ ?>
   <tr> 
    <td>
      <video width="400" height="300" controls="controls" onclick="window.location.href='video.php?id=<?php echo $video['id_video'];?>'">
 <source src="<?=$video['file']?>" >
</video>
<h2><? echo $video['name']?></h2>
<h2>Описание:<? echo $video['description']?></h2></td>
<? $kol++;} 
 else {
             ?>
          <td>
      <video width="400" height="300" controls="controls" onclick="window.location.href='video.php?id=<?php echo $video['id_video'];?>'">
 <source src="<?=$video['file']?>" >
</video>
<h2><? echo $video['name']?></h2>
<h2>Описание:<? echo $video['description']?></h2></td>
<? $kol++;} }
             ?>
    </tr></table>     
</center>
</div>


<div id="clear">
	
</div>


</body>
</html>