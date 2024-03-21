<?php 
namespace Opdracht7_OOP\classes;

use Opdracht7_OOP\classes\Student;
use Opdracht7_OOP\classes\Teacher;

class SchooltripList
{
    private Array $studentList = Array();

    private Teacher $teacher;

    public function GetTeacher()
    {
        return $this->teacher;
    }

    public function SetTeacher(Teacher $pTeacher) 
    {
        $this->teacher = $pTeacher;
    }

    public function GetStudentList()
    {
        return $this->studentList;
    }
    
    public function AddStudent(Student $pStudent)
    {
        $this->studentList[] = $pStudent;
    }
}
?>