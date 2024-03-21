<?php
require_once("../vendor/autoload.php");

use Opdracht7\classes\Teacher;
use Opdracht7\classes\Student;
use Opdracht7\classes\Schooltrip;
use Opdracht7\classes\Group;


$SOD2A = new Group("SOD2A");
$SOD2B = new Group("SOD2B");

$myTeacher = new Teacher("Bo tighelhoven");
$myTeacher->SetSalary(2384.73);
$myTeacher = new Teacher("Barry van Helden");
$myTeacher->SetSalary(2235.36);
$myTeacher = new Teacher("Rob Wigmans");
$myTeacher->SetSalary(2138.23);

$mySchooltrip = new Schooltrip("Walibi", 5);
$mySchooltrip->AddStudent(new Student("Bilal Abbou", $SOD2A));
$mySchooltrip->AddStudent(new Student("Ouail Bouchlaghem", $SOD2A, true));
$mySchooltrip->AddStudent(new Student("Yassine Azdad", $SOD2A));
$mySchooltrip->AddStudent(new Student("Hamza Taha", $SOD2A));
$mySchooltrip->AddStudent(new Student("Ali shwani", $SOD2A, true));
$mySchooltrip->AddStudent(new Student("Abdelaoui Abdelghani", $SOD2A));
$mySchooltrip->AddStudent(new Student("Amin Aouargh", $SOD2B, true));
$mySchooltrip->AddStudent(new Student("Berkay onal", $SOD2B, true));
$mySchooltrip->AddStudent(new Student("Diego Ballestro", $SOD2A, true));
$mySchooltrip->AddStudent(new Student("Rohan Dayal", $SOD2B));
$mySchooltrip->AddStudent(new Student("Azad Akin", $SOD2A));
$mySchooltrip->AddStudent(new Student("Ayoub El Ibrahimin", $SOD2B));
$mySchooltrip->AddStudent(new Student("Rauf Birkhie", $SOD2A, true));

// var_dump($mySchooltrip);
echo($mySchooltrip->GetTable());
?>