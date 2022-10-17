<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Загрузка видео</title>
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
<? $id= $_GET['id']; ?>
	<h1>Загрузить видео</h1>
	<h2>Если вам нужно отредактировать видео,<p>то предлагаем вам воспользоваться <p>этими онлайн-сервисами: <p>
		<a href="https://online-video-cutter.com/ru/"><b>Онлайн обрезка видео</b></a>
	<p><a href="https://clipchamp.com/ru/video-editor"><b>Онлайн редактирование видео</b></h2></a>
<form method="post" action="video\basic.php?id=<?php echo $id;?>#zatemnenie" enctype="multipart/form-data">
	<table>
		<tr><td></td><td>ИЛИ</td></tr>
		<tr>
	<td><label for="inputfile"><h2>Введите ссылку</h2></label></td>
<td><input name="n" type="text" size="40" maxlength="30"></td>
</tr>
		<tr>
	<td><label for="inputfile"><h2>Введите название</h2></label></td>
<td><input name="name" type="text" size="40" maxlength="100"></td>
</tr>
<tr>
<td><label for="inputfile"><h2>Описание видео:</h2></label></td>
<td><input name="des" type="text" size="40" maxlength="100"></td>
</tr>
<tr>	
<label for="inputfile"><h2>Чтобы загрузить видео, выберите файл</h2></label>
<input type="file" id="inputfile" name="inputfile"></br>
</tr>
<tr><td></td><td>
<input type="submit" value="Загрузить"></td></tr>
</table>
</center>

</div>

<div id="clear">
	
</div>


</body>
</html>