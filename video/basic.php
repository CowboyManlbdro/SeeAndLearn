<?session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Добавление курса</title>
<link rel="stylesheet" type="text/css" href="../css/nice.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div id="list">

</div>

<div id="header" >
<?php include ('..\header.php'); ?>
</div>
<?
 $id= $_GET['id'];
      if ($id){
          $course= getCourseById($db, $id);
       } else {
         echo "<h1>Ошибка</h1>";
         exit ();
       }

if((isset($_FILES) && $_FILES['inputfile']['error'] == 0) && ($_POST['name'] && $_POST['des'] != '')){ 
// Проверяем, загрузил ли пользователь файл
$destiation_dir = dirname(__FILE__) .'\\'.$_FILES['inputfile']['name']; // Директория для размещения файла
move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation_dir ); // Перемещаем файл в желаемую директорию
$author=$_SESSION['user'];
$name=$_POST['name'];
$des=$_POST['des'];
$sub=$course['subject'];
$cat=$course['category'];
$cour=$course['course'];
$dir='video'.'/'.$_FILES['inputfile']['name'];
$f=" ";
$data=date("Y-m-d");
addVideo($db,$name, $des, $sub, $cat,$cour,$dir,$author,$f,$data);
?>
 <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Видео успешно добавлено!</h2> <br>
        <a href="..\course.php?id=<?php echo $course['id_course']?>" class="close">Закрыть окно</a>
      </div>
    </div>
<?
}
else{ ?>
 <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Не удалось добавить видео</h2> <br>
        <a href="..\course.php?id=<?php echo $course['id_course']?>" class="close">Закрыть окно</a>
      </div>
    </div>
</div>
    <?
}
?>



</body>
</html>

