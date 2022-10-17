<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Видео</title>
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
          $video= getVideoById($db, $id);
       } else {
         echo "<h1>Ошибка</h1>";
         exit ();
       }
      ?>
      <h1><? echo $video['name'];  ?></h1>

     
      
      <video width="1020" height="610" controls="controls">
 <source src="<?=$video['file']?>" >
</video>
<h2><? echo $video['description']?></h2>


 <? if (($_SESSION['type']=='teach')&&($_SESSION['user']==$video['author'])) { ?>


<button class="btn btn-danger btn-sm"  onclick="window.location.href='delvideo.php?id=<?php echo $video['id_video'];?>#zatemnenie'"><h2>Удалить видео</h2></button> 

<button class="btn btn-success btn-sm"  onclick="window.location.href='editvideo.php?id=<?php echo $video['id_video'];?>'"><h2>Изменить</h2></button> 
 
<? } ?>
 
</center>
</div>

<div id="clear">
	
</div>


</body>
</html>