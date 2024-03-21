<?php 
namespace Opdracht7\classes;

use Opdracht7\classes\Student;
use Opdracht7\classes\Teacher;

class SchooltripList
{
    private Array $studentList = Array();

    private Teacher $teacher;

    public function SetTeacher(Teacher $pTeacher) 
    {
        $this->teacher = $pTeacher;
    }

    public function GetTeacher()
    {
        return $this->teacher;
    }

    public function AddStudent(Student $pStudent)
    {
        $this->studentList[] = $pStudent;
    }

    public function GetStudentList()
    {
        return $this->studentList;
    }
}
?>