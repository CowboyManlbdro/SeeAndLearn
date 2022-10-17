<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Новый курс</title>
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
 <h1>Создание курса</h1>
 
  <form action="addcourse.php#zatemnenie" method="post">
  	<table>
  		<tr>
<p>
    <td><label>Выберете предмет <br></label></td>
    <td><select name="sub"  class="form-control" id="sub">
      <?php
           $subjects=getAllSubject($db);
           foreach ($subjects as $subject) {
           echo "<option value=".$subject ['subject'].">".$subject['subject']."</option>";
              
           }
         ?>
      </select>
    </td>
    </p>
</tr>
<tr>
<p>
    <td><label>Выберете категорию:<br></label></td>
    <td><select name="cat"  class="form-control" id="cat">
      <?php
           $categories=getAllCategory($db);
           foreach ($categories as $category) {
           echo "<option value=".$category ['category'].">".$category['category']."</option>";
              
           }
         ?>
      </select></td>
    </p>
</tr>
<tr>
<p>
    <td><label>Название курса:<br></label></td>
    <td><input name="nam" type="text" size="40" maxlength="50"></td>
    </p>
</tr>
<tr>
<p>
    <td><label>Описание курса:<br></label></td>
    <td><input name="des" type="text" size="40" maxlength="50"></td>
    </p>
</tr>
<tr>
<p>
                    <tr>
                    	<td></td>
                    <td><p>
    <input type="submit" name="submit" value="Добавить">
</p>
</td>
</tr>
</table>
                    </form>
                    </center>
</div>

<div id="clear">
	
</div>


</body>
</html>