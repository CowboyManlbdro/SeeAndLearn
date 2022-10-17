<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Подписка</title>
<link rel="stylesheet" type="text/css" href="css/nice.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div id="list">

</div>

<div id="header" >
<?php include ('header.php'); ?>
<?
 $id= $_GET['id'];
      if ($id){

       } else {
         echo "<h1>Ошибка</h1>";
         exit ();
       }

NewSubscribe($db, $id, $_SESSION['user']);
PlusSubscribe($db, $id);
?>  				
</div>



<div id="cen">
	  <div id="zatemnenie">
      <div id="okno">
        <h2>Вы успешно подписались!</h2> <br>
        <a href="course.php?id=<?php echo $id?>" class="close">Закрыть окно</a>
      </div>
    </div>

</div>

<div id="clear">
	
</div>


</body>
</html>

