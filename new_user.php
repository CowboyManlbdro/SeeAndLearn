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
  if(isset($_POST['login']) && $_POST['password']&& $_POST['f']&& $_POST['i']&& $_POST['o']&&($_POST['typereg'])  != ''){
         $captcha = trim($_POST["captcha"]);

            if($_SESSION["rand_captcha"] != $captcha){
              session_destroy();
                ?><div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Неправильно введена картинка!</h2> <br>
        <a href="registration.php" class="close">Закрыть окно</a>
      </div>
    </div> <?php
               
            } else{
              if ($_POST['typereg']=='Stud'){
          $l=$_POST['login'];
          if ((LogFreeS($db,$l))&& (LogFreeT($db,$l))){
          $pass=$_POST['password'];
          $f=$_POST['f'];
          $i=$_POST['i'];
          $o=$_POST['o'];
          $foto='photo/nofoto.jpg';
          addStudent($db, $l, $pass,$f,$i,$o, $foto);
          session_destroy();
        }
        else { session_destroy(); ?> <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Такой логин уже существует!</h2> <br>
        <a href="registration.php" class="close">Закрыть окно</a>
      </div>
    </div> <?}
      }
        else {
          $l=$_POST['login'];
          if ((LogFreeT($db,$l))&& (LogFreeS($db,$l))){
          $pass=$_POST['password'];
          $f=$_POST['f'];
          $i=$_POST['i'];
          $o=$_POST['o'];
          $foto='photo/nofoto.jpg';
          addTeacher($db, $l, $pass,$f,$i,$o, $foto);
          session_destroy();
        }
         else { session_destroy(); ?> <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Такой логин уже существует!</h2> <br>
        <a href="registration.php" class="close">Закрыть окно</a>
      </div>
    </div> <?}
        }
        ?>

        <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Вы успешно зарегистрировались!</h2> <br>
        <a href="main.php" class="close">Закрыть окно</a>
      </div>
    </div>
    <?php
      }

       } 
       else { session_destroy(); ?> <div id="cen">
    <div id="zatemnenie">
      <div id="okno">
        <h2>Заполните все поля!</h2> <br>
        <a href="registration.php" class="close">Закрыть окно</a>
      </div>
    </div> <?}
?>          
</div>





</div>

<div id="clear">
  
</div>


</body>
</html>
