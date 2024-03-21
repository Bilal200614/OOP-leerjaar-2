<?php
namespace Opdracht7_OOP\classes;

abstract class Person
{
    private string $name;

    private string $role;

    function GetRole(): string
    {
        return $this->role;
    }
    function GetName(): string
    {
        return $this->name;
    }
    public function __construct(string $pName)
    {
        $this->name = $pName;
    }
    function SetRole(string $pRole = null)
    {
        if ($pRole !== null) {
            $this->role = $pRole;
        }
    }
}
?>