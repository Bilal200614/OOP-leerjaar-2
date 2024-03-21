<?php
namespace Opdracht7\classes;

use Opdracht7\classes\Person;
use Opdracht7\classes\Group;

class Student extends Person
{
    private Group $classname;

    private bool $hasPaid = false;
    
    public function __construct(string $pName, Group $pGroup, bool $pHasPaid = null) {
        parent::__construct($pName);
        $this->SetRole();
        $this->classname = $pGroup;
        if ($pHasPaid != null) { $this->hasPaid = $pHasPaid; }
    }

    public function SetRole(string $pRole = null)
    {
        parent::SetRole(basename(static::class));
    }

    public function Role() {
        return $this->role;
    }

    public function SetHasPaid(bool $pHasPaid)
    {
        $this->hasPaid = $pHasPaid;
    }

    public function GetHasPaid()
    {
        return $this->hasPaid;
    }

    public function GetGroup()
    {
        return $this->classname;
    }
}
?>