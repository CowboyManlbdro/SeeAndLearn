<?session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script>
function openForm() {
    document.getElementById("myForm").style.display = "block"; }
     function closeForm() {
    document.getElementById("myForm").style.display = "none";
} </script>
 
<?php include 'connectbase.php';
    include 'request.php';
     $subjects= getAllSubject($db);
     $populars=getPopularCourse($db);
     /*$categoties= getAllCategory($db);
     $courses= getAllCourse($db);*/////////
      ?>
<nav class="navbar navbar-fixed-top navbar-dark " >
          <ul class="nav navbar-nav">
            <li><a href="" class="active"><h1>Список курсов</h1><span class="fa fa-angle-down"></span></a>
      <ul class="submenu">
         <?php foreach ($subjects as $subject) { ?>
        <li><a href=""><h2><? echo $subject ['subject']; ?></h2><span class="fa fa-angle-down"></span></a>
          <ul class="submenu">
            <?php 
        $sub=$subject['subject'];
         $categories=getCategoryBySubject($db,$sub);
        foreach ($categories as $category) { 
          ?>
            <li><a href=""><h2><? echo $category ['category']; ?></h2><span class="fa fa-angle-down"></span></a>
            <ul class="submenu">
              <?php 
        $cat=$category ['category'];
         $courses=getCourseByCategory($db,$cat);
        foreach ($courses as $course) { 
          ?>
              <li><a href="course.php?id=<?php echo $course['id_course'];?>"><h2><? echo $course ['course']; ?></h2></a> </li>
              <?}  ?>
            </ul>
          </li>
          <?}  ?>
          </ul>
          
        </li>
        <?  }?>
      </ul>
    </li>
             <li><a href="" class="active"><h1>Популярные курсы</h1><span class="fa fa-angle-down"></span></a>
      <ul class="submenu">
         <?php 
        foreach ($populars as $popular) { 
          ?>
              <li><a href="course.php?id=<?php echo $popular['id_course'];?>"><h2><? echo $popular ['course']; ?> <p>Кол-во подписчиков: <? echo $popular ['subscribes'];?></h2></a> </li>
              <?}  ?>
      </ul>
             </li>
  </ul>

  <div class="home">
  <a href="main.php"></a>
</div>

<div class="d1">
  <form id="lol" action="search.php" method="post">
  <input name="search" type="text" placeholder="Искать здесь...">
  <button type="submit"></button>
  </form>
</div>



            <?php if(!empty($_SESSION)){ 
              if ($_SESSION['type']=='stud'){
              $user=getStudentFotoByLogin($db,$_SESSION['user']);}
              else {
                $user=getTeacherFotoByLogin($db,$_SESSION['user']);
              }
          ?>
              <div class="foto">
<img src="<?=$user['foto']?>" ><span class="fa fa-angle-down">
  <div class="descr">
<button class="btn btn-primary btn-sm"  onclick="window.location.href='photoupload.php'"><h2>Загрузить фото</h2></button>
<button class="btn btn-primary btn-sm"  onclick="window.location.href='usercourses.php'"><h2>Мои курсы</h2></button>
<!-- <button class="btn btn-primary btn-sm" onclick="window.location.href='logout.php#zatemnenie'"><h2>ВЫЙТИ</h2></button> -->
</div>

</div>
                     <div class="log">
                     <h2>Пользователь: <?php echo $_SESSION['user']; ?></h2></div>
                     <button class="btn btn-primary btn-sm" id="open-button" onclick="window.location.href='logout.php#zatemnenie'"><h2>ВЫЙТИ</h2></button>
                   
            <?php } else { ?>

 <button class="btn btn-primary btn-sm" id="open-button" onclick="openForm()"><h2>ВОЙТИ</h2></button>
  <div class="form-popup" id="myForm">
              <div class="container-fluid">
  <form action="login.php#zatemnenie" method="POST" role="form">
  <h1>Войти</h1>
    <div class="form-group">
      <label for=""><h2>Логин</h2></label>
      <input type="text" class="form-control" id="login" name="login"  >
    </div>
  
    <div class="form-group">
      <label for=""><h2>Пароль</h2></label>
      <input type="password" class="form-control" id="password" name="password"  >
    </div>
  
    <button type="submit" class="btn btn-primary"><h3>Войти</h3></button> <a class="btn btn-success"  href="registration.php"><h3>Регистрация</h3></a>
    <button type="button" class="btn cancel" onclick="closeForm()"><h3>Закрыть</h3></button>
  </form>
  
</div>
            <?php } ?>
          </div>
 



</nav>