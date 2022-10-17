<?php 
function addUser ($db, $l, $pass){
	$sql= "INSERT INTO users (login,password) VALUES(:login,:password)

	";

	$stmt=$db->prepare($sql);
	$stmt->bindValue(':login',$l,PDO::PARAM_STR);
	$stmt->bindValue(':password',$pass,PDO::PARAM_STR);

	$stmt->execute();
}

function addStudent ($db, $l, $pass, $f, $i, $o, $foto){
	$sql= "INSERT INTO student (login,f,i,o,password, foto) VALUES(:login,:f,:i,:o,:password, :foto)

	";

	$stmt=$db->prepare($sql);
	$stmt->bindValue(':login',$l,PDO::PARAM_STR);
	$stmt->bindValue(':f',$f,PDO::PARAM_STR);
	$stmt->bindValue(':i',$i,PDO::PARAM_STR);
	$stmt->bindValue(':o',$o,PDO::PARAM_STR);
	$stmt->bindValue(':password',$pass,PDO::PARAM_STR);
    $stmt->bindValue(':foto',$foto,PDO::PARAM_STR);
	$stmt->execute();
}

function addTeacher($db, $l, $pass, $f, $i, $o, $foto){
	$sql= "INSERT INTO teacher (login,f,i,o,password, foto) VALUES(:login,:f,:i,:o,:password,:foto)

	";

	$stmt=$db->prepare($sql);
	$stmt->bindValue(':login',$l,PDO::PARAM_STR);
	$stmt->bindValue(':f',$f,PDO::PARAM_STR);
	$stmt->bindValue(':i',$i,PDO::PARAM_STR);
	$stmt->bindValue(':o',$o,PDO::PARAM_STR);
	$stmt->bindValue(':password',$pass,PDO::PARAM_STR);
    $stmt->bindValue(':foto',$foto,PDO::PARAM_STR);
	$stmt->execute();
}

function addCourse ($db, $sub, $cat, $name, $des, $aut, $subscr){
	$sql= "INSERT INTO courses (subject,category,course,description,author, subscribes) VALUES(:subject,:category,:course,:description,:author, :subscribes)

	";

	$stmt=$db->prepare($sql);
	$stmt->bindValue(':subject',$sub,PDO::PARAM_STR);
	$stmt->bindValue(':category',$cat,PDO::PARAM_STR);
	$stmt->bindValue(':course',$name,PDO::PARAM_STR);
	$stmt->bindValue(':description',$des,PDO::PARAM_STR);
	$stmt->bindValue(':author',$aut,PDO::PARAM_STR);
    $stmt->bindValue(':subscribes',$subscr,PDO::PARAM_INT);
	$stmt->execute();
}

function addVideo ($db, $name,$des, $sub, $cat,$cour,$dir, $aut, $f, $data){
	$sql= "INSERT INTO video (name, description,subject,category,course,author,date_v,file,for_lent) VALUES(:name,:description,:subject,:category,:course,:author,:date_v,:file,:for_lent)

	";

	$stmt=$db->prepare($sql);
	$stmt->bindValue(':name',$name,PDO::PARAM_STR);
	$stmt->bindValue(':description',$des,PDO::PARAM_STR);
	$stmt->bindValue(':subject',$sub,PDO::PARAM_STR);
	$stmt->bindValue(':category',$cat,PDO::PARAM_STR);
	$stmt->bindValue(':course',$cour,PDO::PARAM_STR);
	$stmt->bindValue(':author',$aut,PDO::PARAM_STR);
	$stmt->bindValue(':file',$dir,PDO::PARAM_STR);
$stmt->bindValue(':for_lent',$f,PDO::PARAM_STR);
$stmt->bindValue(':date_v',$data,PDO::PARAM_STR);
	$stmt->execute();
}



function isStudent($db, $user, $password){
      $sql= "SELECT login, password FROM student
             WHERE login=:login AND password=:password 
      ";

      $stmt=$db->prepare($sql);

		$stmt->bindValue(':login',$user,PDO::PARAM_STR);
		$stmt->bindValue(':password',$password,PDO::PARAM_STR);

		$stmt->execute();

		$row= $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row)){
            return true;
		} else {
			return false;
		}
}
function getStudent ($db,$log) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT * FROM student
	WHERE login='$log'
	";
	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	$row=$stmt->fetch(PDO::FETCH_ASSOC); 

	 	$result=$row;


	 return $result;
}

function getTeacher ($db,$log) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT * FROM teacher
	WHERE login='$log'
	";
	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	$row=$stmt->fetch(PDO::FETCH_ASSOC); 

	 	$result=$row;


	 return $result;
}

function getStudentFotoByLogin ($db,$login) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT foto FROM student
	WHERE login='$login'
	";

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	$row=$stmt->fetch(PDO::FETCH_ASSOC); 

	 	$result=$row;


	 return $result;
}

function getTeacherFotoByLogin ($db,$login) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT foto FROM teacher
	WHERE login='$login'
	";

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	$row=$stmt->fetch(PDO::FETCH_ASSOC); 

	 	$result=$row;


	 return $result;
}

function isTeacher($db, $user, $password){
      $sql= "SELECT login, password FROM teacher
             WHERE login=:login AND password=:password 
      ";

      $stmt=$db->prepare($sql);

		$stmt->bindValue(':login',$user,PDO::PARAM_STR);
		$stmt->bindValue(':password',$password,PDO::PARAM_STR);

		$stmt->execute();

		$row= $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row)){
            return true;
		} else {
			return false;
		}
}

function getAllCourse ($db){
	$db->query( "SET CHARSET utf8" );

	$sql= "SELECT * FROM courses
	";

	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_course']]=$row;
	 }

	 return $result;
}

function getPopularCourse ($db){
	$db->query( "SET CHARSET utf8" );

	$sql= "SELECT * FROM courses ORDER BY subscribes DESC
	";

	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_course']]=$row;
	 }

	 return $result;
}

function Search ($db, $s){
	$db->query( "SET CHARSET utf8" );

	$sql= "SELECT * FROM courses
	WHERE course LIKE '%$s%'
	";

	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_course']]=$row;
	 }

	 return $result;
}

function getAllSubject ($db){
	$db->query( "SET CHARSET utf8" );

	$sql= "SELECT * FROM subjects
	";

	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_subject']]=$row;
	 }

	 return $result;
}

function getAllCategory ($db){
	$db->query( "SET CHARSET utf8" );

	$sql= "SELECT * FROM categories
	";

	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_category']]=$row;
	 }

	 return $result;
}

function getCourseById ($db,$id) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT * FROM courses
	WHERE id_course=:id_course 
	";
	$stmt = $db->prepare($sql);
	$stmt->bindValue ('id_course',$id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}

function getCourseByVideo ($db,$vid) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT * FROM courses
	WHERE course=:vid_course 
	";
	$stmt = $db->prepare($sql);
	$stmt->bindValue ('vid_course',$vid, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}


function getVideoByCourseSort ($db) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT * FROM video 
	WHERE for_lent='+' ORDER BY date_v DESC
	";
	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_video']]=$row;
	 }

	 return $result;
}


function getVideoById ($db,$id) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT * FROM video
	WHERE id_video=:id_video 
	";
	$stmt = $db->prepare($sql);
	$stmt->bindValue ('id_video',$id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}

function getVideoByCourse ($db,$cour) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT * FROM video
	WHERE course='$cour'
	";
	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_video']]=$row;
	 }

	 return $result;
}

function getCategoryBySubject ($db,$sub) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT * FROM categories
	WHERE subject='$sub'
	";
	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_category']]=$row;
	 }

	 return $result;
}

function getCourseByCategory ($db,$cat) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT * FROM courses
	WHERE category='$cat'
	";
	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_course']]=$row;
	 }

	 return $result;
}

function NewSubscribe ($db, $idc, $ls){
$sql= "INSERT INTO subscribes (id_sub,login_subscriber) VALUES(:id_sub,:login_subscriber)

	";

	$stmt=$db->prepare($sql);
	$stmt->bindValue(':id_sub',$idc,PDO::PARAM_STR);
	$stmt->bindValue(':login_subscriber',$ls,PDO::PARAM_STR);

	$stmt->execute();
}

function PlusSubscribe ($db, $idc){
$sql= "UPDATE courses SET subscribes=subscribes+1
    WHERE id_course='$idc'
	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}

function getPlusForLent ($db, $c){
$sql= "UPDATE video SET for_lent='+'
    WHERE course='$c'
	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}

function getClearForLent ($db){
$sql= "UPDATE video SET for_lent=' '
	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}
function addFotoStudent ($db, $login, $dir){
$sql= "UPDATE student SET foto='$dir'
    WHERE login='$login'
	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}

function addFotoTeacher ($db, $login, $dir){
$sql= "UPDATE teacher SET foto='$dir'
    WHERE login='$login'
	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}

function MinusSubscribe ($db, $idc){
$sql= "UPDATE courses SET subscribes=subscribes-1
    WHERE id_course='$idc'
	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}

function getIdCourseBySubscriber ($db,$user) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT id_sub FROM subscribes
	WHERE login_subscriber='$user'
	";
	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_sub']]=$row;
	 }

	 return $result;

}

function isUser($db, $user, $password){
      $sql= "SELECT student.login, student.password, teacher.login, teacher.password FROM student,teacher
             WHERE student.login=:login AND student.password=:password OR teacher.login=:login AND teacher.password=:password
      ";

      $stmt=$db->prepare($sql);

		$stmt->bindValue(':login',$user,PDO::PARAM_STR);
		$stmt->bindValue(':password',$password,PDO::PARAM_STR);

		$stmt->execute();

		$row= $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row)){
            return true;
		} else {
			return false;
		}
}

function SubscribeOrNot ($db,$id,$user) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT id_subscribe FROM subscribes
	WHERE login_subscriber='$user' AND id_sub='$id'
	";
	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_subscribe']]=$row;
	 }
if (!empty($result)){
	return true;
}
else {
	return false;
}
	 

}


function LogFreeS ($db,$l) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT login FROM student
	WHERE login='$l' 
	";
	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_student']]=$row;
	 }
if (!empty($result)){
	return false;
}
else {
	return true;
}
	 

}


function LogFreeT ($db,$l) {
	$db->query( "SET CHARSET utf8" );
	$sql = "SELECT login FROM teacher
	WHERE login='$l' 
	";
	$result=array();

	$stmt= $db->prepare($sql);

	$res=$stmt->execute();

	 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	 	$result[$row['id_teacher']]=$row;
	 }
if (!empty($result)){
	return false;
}
else {
	return true;
}
	 

}

function DelSubscribe ($db, $id, $user){
$sql= "DELETE FROM subscribes WHERE id_sub='$id' AND login_subscriber='$user'

	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}

function DelCourse ($db, $id){
$sql= "DELETE FROM courses WHERE id_course='$id' 

	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}

function DelVideo ($db, $id){
$sql= "DELETE FROM video WHERE id_video='$id' 

	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}


function UpCourse ($db, $idc, $sub, $cat, $name, $des){
$sql= "UPDATE courses SET subject='$sub', category='$cat', course='$name', description='$des'
    WHERE id_course='$idc'
	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}

function UpVideo ($db, $idv, $name, $des){
$sql= "UPDATE video SET name='$name', description='$des'
    WHERE id_video='$idv'
	";

	$stmt=$db->prepare($sql);

	$stmt->execute();
}