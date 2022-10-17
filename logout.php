<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
<link rel="stylesheet" type="text/css" href="css/nice.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div id="list">

</div>

<div id="header" >
<?php include ('header.php'); ?>
<?
session_destroy();
?>  				
</div>



<div id="cen">
	  <div id="zatemnenie">
      <div id="okno">
        <h2>Вы успешно вышли из аккаунта!</h2> <br>
        <a href="main.php" class="close">Закрыть окно</a>
      </div>
    </div>

</div>

<div id="clear">
	
</div>


</body>
</html>

