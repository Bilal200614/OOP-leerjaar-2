<?php
namespace Opdracht7\classes;

use Opdracht7\classes\SchooltripList;
use Opdracht7\classes\Student;
use Opdracht7\classes\Teacher;

class Schooltrip 
{
    private string $name;

    private int $studentsPerGroup = 5;

    private Array $schooltripLists = Array();

    public function __construct(string $pName, int $pStudentsPerGroup = null)
    {
        $this->name = $pName;
        if ($pStudentsPerGroup != null) { $this->studentsPerGroup = $pStudentsPerGroup; }
    }

    public function AddStudent($pStudent) {
        $listFound = false;
        foreach ($this->schooltripLists as $schooltripList) {
            if (count($schooltripList->GetStudentList()) < $this->studentsPerGroup) {
                $schooltripList->AddStudent($pStudent);
                $listFound = true;
                break;
            }
        }
    
        if (!$listFound) {
            $newSchooltripList = new SchooltripList();
    
            $teacher = $this->findAvailableTeacher();
            $newSchooltripList->SetTeacher($teacher);
            $newSchooltripList->AddStudent($pStudent);
    
            $this->schooltripLists[] = $newSchooltripList;
        }
    }

    private function findAvailableTeacher() {
        foreach (Teacher::$Teachers as $teacher) {
            $used = false;
            foreach ($this->schooltripLists as $schooltripList) {
                if ($schooltripList->GetTeacher()->GetName() == $teacher->GetName()) {
                    $used = true;
                    break;
                }
            }
            if (!$used) {
                return $teacher;
            }
        }
        throw new \Exception("No (more) teachers available!");
    }

    public function GetTable()
    {
        $html = "<table border='1'>";
        $html .= "<tr><th>Docent</th><th>Student</th><th>Klas</th><th>Betaald</th></tr>";

        foreach ($this->schooltripLists as $schooltripList) {
            $html .= "<tr>";
            $html .= "<td>" . $schooltripList->GetTeacher()->getName() . "</td>";
            $html .= "<td></td>";
            $html .= "<td></td>";
            $html .= "<td></td>";
            $html .= "</tr>";

            foreach ($schooltripList->GetStudentList() as $student) {
                $html .= "<tr>";
                $html .= "<td></td>";
                $html .= "<td>" . $student->GetName() . "</td>";
                $html .= "<td>" . $student->GetGroup()->GetName() . "</td>";
                $html .= "<td>" . ($student->GetHasPaid() ? "Ja" : "Nee") . "</td>";
                $html .= "</tr>";
            }
        }

        $html .= "</table>";
        
        return $html;
    }

}
?>