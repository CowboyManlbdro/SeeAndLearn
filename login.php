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
                
</div>



<div id="cen">
    <?

    if(!empty($_POST)){
        if ($_POST['login']!='' && $_POST['password']!= ''){
            $login=trim(strip_tags($_POST['login']));
            $password=trim(strip_tags($_POST['password']));
            if (isStudent($db,$login,$password)){
                $_SESSION ['user']=$login;
                $_SESSION ['type']='stud';
               /* echo "<h1>Вы успешно вошли</h1> ";*/ ?>
                <div id="zatemnenie">
      <div id="okno">
        <h2>Вы успешно вошли!</h2> <br>
        <a href="main.php" class="close">Закрыть окно</a>
      </div>
    </div>
                <?
                /*echo '<script>location.replace("main.php");</script>';*/
            }
            else {
                if (isTeacher($db,$login,$password)){
                $_SESSION ['user']=$login;
                $_SESSION ['type']='teach';
               /* echo "<h1>Вы успешно вошли</h1> ";*/ ?>
                <div id="zatemnenie">
      <div id="okno">
        <h2>Вы успешно вошли!</h2> <br>
        <a href="main.php" class="close">Закрыть окно</a>
      </div>
    </div>
                <?

            }
            else{
                ?>
                <div id="zatemnenie">
      <div id="okno">
        <h2>Пользователь не найден!</h2> <br>
        <a href="main.php" class="close">Закрыть окно</a>
      </div>
    </div>
                <?
        }

             
            }
        } 
        else {
            ?>
                <div id="zatemnenie">
      <div id="okno">
        <h2>Заполните все поля!</h2> <br>
        <a href="main.php" class="close">Закрыть окно</a>
      </div>
    </div>
                <?
        }
    } 

?>

</div>

<div id="clear">
    
</div>


</body>
</html>

