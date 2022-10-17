<?session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?include 'C:\Users\1\Desktop\OSPanel\domains\SeeAndLearn\www\connectbase.php';
  include 'C:\Users\1\Desktop\OSPanel\domains\SeeAndLearn\www\request.php';

if(isset($_FILES) && $_FILES['inputfile']['error'] == 0){ 
var_dump($_FILES['inputfile']['name']);// Проверяем, загрузил ли пользователь файл
$destiation_dir = dirname(__FILE__) .'\\'.$_FILES['inputfile']['name']; // Директория для размещения файла
move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation_dir ); // Перемещаем файл в желаемую директорию
echo 'File Uploaded'; // Оповещаем пользователя об успешной загрузке файла
$dir='photo'.'/'.$_FILES['inputfile']['name'];
if ($_SESSION['type']=='stud'){
addFotoStudent($db,$_SESSION['user'],$dir);}
else {
addFotoTeacher($db,$_SESSION['user'],$dir);}
}
else{
echo 'No File Uploaded'; // Оповещаем пользователя о том, что файл не был загружен
}
?>
</body>
</html>

