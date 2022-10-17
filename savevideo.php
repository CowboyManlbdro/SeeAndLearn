<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Сохранение видео</title>
<link rel="stylesheet" type="text/css" href="css/nice.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div id="list">

</div>

<div id="header" >
<?php include ('header.php'); ?>
<?
  if(isset($_POST['nam'])&& $_POST['des'] != ''){

           $id= $_GET['id'];   
          $n=$_POST['nam'];
          $d=$_POST['des'];
          UpVideo($db,$id,$n,$d);
        
        ?>

        <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Информация о видео изменена!</h2> <br>
        <a href="main.php" class="close">Закрыть окно</a>
      </div>
    </div>
    <?php
      

       } 
       else {  ?> <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Заполните все поля!</h2> <br>
        <a href="editvideo.php?id=<?php echo $id?>" class="close">Закрыть окно</a>
      </div>
    </div> <?}
?>          
</div>





</div>

<div id="clear">
  
</div>


</body>
</html>
