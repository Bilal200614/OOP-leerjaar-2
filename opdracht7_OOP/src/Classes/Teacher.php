<?php
namespace Opdracht7_OOP\classes;

use Opdracht7_OOP\classes\Person;

class Teacher extends Person
{
    private float $salary;

    public static array $Teachers = Array();

    public function __construct(string $pName) {
        parent::__construct($pName);
        self::$Teachers[] = $this;
        $this->SetRole();
    }

    public function Role() {
        return $this->role;
    }

    public function SetRole(string $pRole = null)
    {
        parent::SetRole(basename(static::class));
    }

    public function GetSalary()
    {
        return $this->salary;
    }
    
    public function SetSalary(float $pSalary)
    {
        $this->salary = $pSalary;
    }
}
?>