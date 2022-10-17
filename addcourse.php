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
<?
  if(isset($_POST['sub']) && $_POST['cat']&& $_POST['nam']&& $_POST['des'] != ''){

              
          $s=$_POST['sub'];
          $c=$_POST['cat'];
          $n=$_POST['nam'];
          $d=$_POST['des'];
          $a=$_SESSION['user'];
          $subscr=0;
          addCourse($db, $s, $c,$n,$d,$a, $subscr);
        
        ?>

        <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Курс добавлен!</h2> <br>
        <a href="main.php" class="close">Закрыть окно</a>
      </div>
    </div>
    <?php
      

       } 
       else {  ?> <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Заполните все поля!</h2> <br>
        <a href="newcourse.php" class="close">Закрыть окно</a>
      </div>
    </div> <?}
?>          
</div>





</div>

<div id="clear">
  
</div>


</body>
</html>
