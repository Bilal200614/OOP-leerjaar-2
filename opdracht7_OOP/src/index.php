<?php
require_once("../vendor/autoload.php");

use Opdracht7_OOP\classes\Teacher;
use Opdracht7_OOP\classes\Student;
use Opdracht7_OOP\classes\Schooltrip;
use Opdracht7_OOP\classes\Group;


$SOD2A = new Group("SOD2A");
$SOD2B = new Group("SOD2B");

$myTeacher = new Teacher("Jan van der Bruggen");
$myTeacher->SetSalary(2384.73);
$myTeacher = new Teacher("John Keus");
$myTeacher->SetSalary(2235.36);
$myTeacher = new Teacher("Barry van Helden");
$myTeacher->SetSalary(2138.23);

$mySchooltrip = new Schooltrip("Efteling", 5);
$mySchooltrip->AddStudent(new Student("Yassine Azdad", $SOD2A));
$mySchooltrip->AddStudent(new Student("Ali shwani", $SOD2A, true));
$mySchooltrip->AddStudent(new Student("Bilal Abbou", $SOD2A));
$mySchooltrip->AddStudent(new Student("Berkay Onal", $SOD2A));
$mySchooltrip->AddStudent(new Student("Ermin Sehic", $SOD2B, true));
$mySchooltrip->AddStudent(new Student("Yasir Radja", $SOD2B, true));
$mySchooltrip->AddStudent(new Student("Diego Ballestro", $SOD2A, true));
$mySchooltrip->AddStudent(new Student("Kees van der Spek", $SOD2B));
$mySchooltrip->AddStudent(new Student("Klaas Stoom", $SOD2A));
$mySchooltrip->AddStudent(new Student("Mohamed Brouwer", $SOD2B));
$mySchooltrip->AddStudent(new Student("Max Overhand", $SOD2A, true));

// var_dump($mySchooltrip);
echo($mySchooltrip->GetTable());
?>