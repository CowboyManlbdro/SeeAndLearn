<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
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
 <h1>Регистрация</h1>
 
  <form action="new_user.php#zatemnenie" method="post">
  	<table>
  		<tr>
<p>
    <td><label>Ваш логин: <br></label></td>
    <td><input name="login" type="text" size="40" maxlength="15"></td>
    </p>
</tr>
<tr>
<p>
    <td><label>Ваш пароль:<br></label></td>
    <td><input name="password" type="password" size="40" maxlength="15"></td>
    </p>
</tr>
<tr>
<p>
    <td><label>Ваша фамилия:<br></label></td>
    <td><input name="f" type="text" size="40" maxlength="15"></td>
    </p>
</tr>
<tr>
<p>
    <td><label>Ваше имя:<br></label></td>
    <td><input name="i" type="text" size="40" maxlength="15"></td>
    </p>
</tr>
<tr>
<p>
    <td><label>Ваше отчество:<br></label></td>
    <td><input name="o" type="text" size="40" maxlength="15"></td>
    </p>
</tr>
<tr>
	<td><label>Выберите тип:</label></td>
    <td> <input type="radio" name="typereg" value="Stud"> Студент <br>
<input type="radio" name="typereg" value="Teach"> Преподаватель</td>
</tr>
                      <tr>
                        <td><label>Введите код с картинки: </label></td>
                               <td> <img src='captcha.php' id='captcha-image'> </td> </tr>
                               <tr>
                               	<td></td>
                                <td><input type="text" name="captcha" required /></td>
                    </tr>
                    <tr>
                    	<td></td>
                    <td><p>
    <input type="submit" name="submit" value="Зарегистрироваться">
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