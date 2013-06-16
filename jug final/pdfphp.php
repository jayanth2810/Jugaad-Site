<?php


//require('C:\xampp\htdocs\fpdf.php'); 
require('fpdf.php'); 
class PDF extends FPDF {
 
function Header() {
    $this->SetFont('Times','',12);
    $this->SetY(0.25);
    $this->Cell(0, .25, "Jugaad ".$this->PageNo(), 'T', 2, "R");
    //reset Y
    $this->SetY(1);
}
 
function Footer() {
//This is the footer; it's repeated on each page.
//enter filename: phpjabber logo, x position: (page width/2)-half the picture size,
//y position: rough estimate, width, height, filetype, link: click it!
    //$this->Image("logo.jpg", (8.5/2)-1.5, 9.8, 3, 1, "JPG", "http://www.phpjabbers.com");
}
 
}




//echo'<title>Registration Complete</title>';

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
$company1=$_POST['company1'];
$company2=$_POST['company2'];
$company3=$_POST['company3'];



//$sql= "INSERT INTO sample (name,age) VALUES ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($age)."');";
$sql2= "INSERT INTO registration (name,age,objective,education,courses,training,honors,experience,awards,activities,volunteer,communities,skills,language,certification,interests,phone,mail,duration,company1,company2,company3) VALUES ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($age)."','".mysql_real_escape_string($objective)."','".mysql_real_escape_string($education)."','".mysql_real_escape_string($courses)."','".mysql_real_escape_string($training)."','".mysql_real_escape_string($honors)."','".mysql_real_escape_string($experience)."','".mysql_real_escape_string($awards)."','".mysql_real_escape_string($activities)."','".mysql_real_escape_string($volunteer)."','".mysql_real_escape_string($communities)."','".mysql_real_escape_string($skills)."','".mysql_real_escape_string($language)."','".mysql_real_escape_string($certification)."','".mysql_real_escape_string($interests)."','".mysql_real_escape_string($phone)."','".mysql_real_escape_string($mail)."','".mysql_real_escape_string($duration)."','".mysql_real_escape_string($company1)."','".mysql_real_escape_string($company2)."','".mysql_real_escape_string($company3)."')";

//$sql = "INSERT INTO `register`.`sample` (`name` ,`age`)VALUES ('pole',  '5')";

if(!mysql_query($sql2, $con))
{
	//die('Error2' . mysql_error());
	echo '<script type="text/javascript"> alert("Mailid/Phone Number Already registered. Click Back to Try Again");window.location.href = "reg.html";</script>';
	die("");
//die('Error2' . mysql_error());
}

//class instantiation
 $pdf=new PDF("P","in","Letter");
 
$pdf->SetMargins(1,1,1);
$pdf->AddPage(); 
//$pdf->AddPage();
$pdf->SetFont('Times','',12);
 
 
$pdf->SetFont('Times','BU',12);
  
//Cell(float w[,float h[,string txt[,mixed border[,
//int ln[,string align[,boolean fill[,mixed link]]]]]]])
//$pdf->Cell(0, .25, "lipsum", 1, 2, "C", 1);
  
$pdf->SetFont('Times','',12);

//$NAME="Name".": ".$name;
//MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
//$pdf->MultiCell(0, 0.5, $lipsum1, 'LR', "L");
//$pdf->MultiCell(0, 0.25, $lipsum2, 1, "R");
//$pdf->MultiCell(0, 0.15, $lipsum3, 'B', "J");
 
//$pdf->AddPage();
$NAME="\nName: ".$name."\nPhone: ".$phone."\nMail: ".$mail."\nAge: ".$age."\nEducation:\n        ".$education."\nCourses:\n        ".$courses."\nHonors:\n        ".$honors."\nTraining:\n        ".$training."\nObjective:\n        ".$objective."\nExperience:\n        ".$experience."\nAwards:\n        ".$awards."\nActivities:\n        ".$activities ."\nVolunteer:\n        ".$volunteer."\nCertification:\n        ".$certification ."\nInterests:\n        ".$interests."\nCommunities:\n        ".$communities."\nSkills:\n        ".$skills."\nLanguage:\n        ".$language."\nDuration: ".$duration."\nChoice 1: ".$company1."\nChoice 2: ".$company2."\nChoice 3: ".$company3;


$pdf->Write(0.5, $NAME);


$pdf->Output();



/*$pdf=new PDF("P","in","Letter");
 
$pdf->SetMargins(1,1,1);
 
$pdf->AddPage();
$pdf->SetFont('Times','',12);
 
$lipsum1="Lorem ipsum dolor sit amet, nam aliquam dolore est, est in eget.";
  
$lipsum2="Nibh lectus, pede fusce ullamcorper vel porttitor.";
  
$lipsum3 ="Duis maecenas et curabitur, felis dolor.";
  
$pdf->SetFillColor(240, 100, 100);
$pdf->SetFont('Times','BU',12);
  
//Cell(float w[,float h[,string txt[,mixed border[,
//int ln[,string align[,boolean fill[,mixed link]]]]]]])
$pdf->Cell(0, .25, "lipsum", 1, 2, "C", 1);
  
$pdf->SetFont('Times','',12);
//MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
$pdf->MultiCell(0, 0.5, $lipsum1, 'LR', "L");
$pdf->MultiCell(0, 0.25, $lipsum2, 1, "R");
$pdf->MultiCell(0, 0.15, $lipsum3, 'B', "J");
 
$pdf->AddPage();
$pdf->Write(0.5, $lipsum1.$lipsum2.$lipsum3);
  
$pdf->Output();*/
mysql_close($con);
?>
