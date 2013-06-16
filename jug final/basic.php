<?php

echo'<title>Registration Complete</title>';

$mysql_host = "mysql6.000webhost.com";
$mysql_database = "a7638716_jugaad";
$mysql_user = "a7638716_jugaad";
$mysql_password = "jugaad123";
$con = mysql_connect($mysql_host,$mysql_user,$mysql_password );
if(!$con)
{
	die('Could not Connect' . mysql_error());
}

mysql_select_db($mysql_database, $con);
$phone = $_POST['phone'];
$mail = $_POST['mailid'];
$age = $_POST['age'];
$name = $_POST['name'];
$education = $_POST['education'];
$courses = $_POST['courses'];
$honors = $_POST['honors'];
$training = $_POST['training'];
$objective = $_POST['objective'];
$experience = $_POST['experience'];
$awards = $_POST['awards'];
$activities = $_POST['activities'];
$volunteer = $_POST['volunteer'];
//$service = $_POST['service'];
$certification = $_POST['certification'];
$interests = $_POST['interests'];
$communities=$_POST['communities'];
$skills=$_POST['skills'];
$language=$_POST['language'];
$duration=$_POST['duration'];



$sql= "INSERT INTO sample (name,age) VALUES ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($age)."');";
$sql2= "INSERT INTO registration (name,age,objective,education,courses,training,honors,experience,awards,activities,volunteer,communities,skills,language,certification,interests,phone,mail,duration) VALUES ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($age)."','".mysql_real_escape_string($objective)."','".mysql_real_escape_string($education)."','".mysql_real_escape_string($courses)."','".mysql_real_escape_string($training)."','".mysql_real_escape_string($honors)."','".mysql_real_escape_string($experience)."','".mysql_real_escape_string($awards)."','".mysql_real_escape_string($activities)."','".mysql_real_escape_string($volunteer)."','".mysql_real_escape_string($communities)."','".mysql_real_escape_string($skills)."','".mysql_real_escape_string($language)."','".mysql_real_escape_string($certification)."','".mysql_real_escape_string($interests)."','".mysql_real_escape_string($phone)."','".mysql_real_escape_string($mail)."','".mysql_real_escape_string($duration)."')";

//$sql = "INSERT INTO `register`.`sample` (`name` ,`age`)VALUES ('pole',  '5')";

if(!mysql_query($sql2, $con))
{
	//die('Error2' . mysql_error());
	echo '<script type="text/javascript"> alert("Mailid/Phone Number Already registered. Click Back to Try Again");window.location.href = "reg.html";</script>';
	die("");
}

// $filename="test.doc";
// $filehandle=fopen($filename,'w');
// fwrite($filehandle,$name);
// fwrite($filehandle,$age);
// fclose($filehandle);

echo '<script type="text/javascript"> alert("You have been succesfully Registered");  window.location.href = "index.html";</script>';

$to = "nks.22.1992@gmail.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "rkarthickraja2693@example.com";
$headers = "From:" . $from;
if(!mail($to,$subject,$message,$headers))
{
	die('Error' . mysql_error());
}






mysql_close($con);

?>
