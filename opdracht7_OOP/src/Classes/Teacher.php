<?php
namespace Opdracht7\classes;

use Opdracht7\classes\Person;

class Teacher extends Person
{
    private float $salary;

    public static array $Teachers = Array();

    public function __construct(string $pName) {
        parent::__construct($pName);
        self::$Teachers[] = $this;
        $this->SetRole();
    }

    public function SetRole(string $pRole = null)
    {
        parent::SetRole(basename(static::class));
    }

    public function Role() {
        return $this->role;
    }

    public function SetSalary(float $pSalary)
    {
        $this->salary = $pSalary;
    }

    public function GetSalary()
    {
        return $this->salary;
    }
}
?>