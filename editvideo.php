<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Изменение видео</title>
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
      <h1>Изменение информации видео <? echo $video['name'];  ?></h1>
      <form action="savevideo.php?id=<?php echo $video['id_video'];?>#zatemnenie" method="post">
    <table>
      <tr>
<p>
    <td><label>Название видео:<br></label></td>
    <td><input name="nam" type="text" size="40" maxlength="40" value="<?php echo $video['name'];?>"></td>
    </p>
</tr>
<tr>
<p>
    <td><label>Описание видео:<br></label></td>
    <td><input name="des" type="text" size="40" maxlength="100" value="<?php echo $video['description'];?>"></td>
    </p>
</tr>
<tr>
<p>
                    <tr>
                      <td></td>
                    <td><p>
    <input type="submit" name="submit" value="Сохранить">
</p>
</td>
</tr>
 
</center>
</div>


<div id="clear">
	
</div>


</body>
</html>