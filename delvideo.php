<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Добавление курса</title>
<link rel="stylesheet" type="text/css" href="css/nice.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div id="list">

</div>

<div id="header" >
<?php include ('header.php'); ?>
</div>
<?
    $id= $_GET['id'];
      if ($id){
        $video= getVideoById($db, $id);
        unlink($video['file']);
         DelVideo($db, $id);
       } else {
         echo "<h1>Ошибка</h1>";
         exit ();
}
        ?>

        <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Видео удалено!</h2> <br>
        <a href="main.php" class="close">Закрыть окно</a>
      </div>
    </div>
        






</div>

<div id="clear">
  
</div>


</body>
</html>
