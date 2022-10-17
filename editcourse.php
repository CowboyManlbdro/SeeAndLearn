<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Изменение курса</title>
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
      <h1>Изменение курса <? echo $course['course'];  ?></h1>
      <form action="savecourse.php?id=<?php echo $course['id_course'];?>#zatemnenie" method="post">
    <table>
      <tr>
<p>
    <td><label>Выберете предмет <br></label></td>
    <td><select name="sub"  class="form-control" id="sub">
      <?php
           $subjects=getAllSubject($db);
           foreach ($subjects as $subject) {
           echo "<option value=".$subject ['subject'].">".$subject['subject']."</option>";
              
           }
         ?>
      </select>
    </td>
    </p>
</tr>
<tr>
<p>
    <td><label>Выберете категорию:<br></label></td>
    <td><select name="cat"  class="form-control" id="cat">
      <?php
           $categories=getAllCategory($db);
           foreach ($categories as $category) {
           echo "<option value=".$category ['category'].">".$category['category']."</option>";
              
           }
         ?>
      </select></td>
    </p>
</tr>
<tr>
<p>
    <td><label>Название курса:<br></label></td>
    <td><input name="nam" type="text" size="40" maxlength="50" value="<?php echo $course['course'];?>"></td>
    </p>
</tr>
<tr>
<p>
    <td><label>Описание курса:<br></label></td>
    <td><input name="des" type="text" size="40" maxlength="100" value="<?php echo $course['description'];?>"></td>
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
</table>
                    </form>
  <?
             $videos= getVideoByCourse($db, $course['course']);
          ?>  <table border="3" bordercolor="#5f99c8"> <?
foreach ($videos as $video) {
 ?>
        <tr>  <td>
      <video width="400" height="300" controls="controls" onclick="window.location.href='video.php?id=<?php echo $video['id_video'];?>'">
 <source src="<?=$video['file']?>" >
</video>
<h2><? echo $video['name']?></h2>
<h2>Автор:<? echo $video['author']?></h2></td><td><button class="btn btn-danger btn-sm"  onclick="window.location.href='delvideo.php?id=<?php echo $video['id_video'];?>#zatemnenie'"><h2>Удалить видео</h2></button> 

<button class="btn btn-success btn-sm"  onclick="window.location.href='editvideo.php?id=<?php echo $video['id_video'];?>'"><h2>Изменить</h2></button></td> </tr>
<? }
             ?>
   </table>     
</center>
</div>


<div id="clear">
	
</div>


</body>
</html>