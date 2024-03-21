<?php
namespace Opdracht7\classes;

abstract class Person
{
    private string $name;

    private string $role;

    public function __construct(string $pName)
    {
        $this->name = $pName;
    }

    function GetRole(): string
    {
        return $this->role;
    }

    function GetName(): string
    {
        return $this->name;
    }

    function SetRole(string $pRole = null)
    {
        if ($pRole !== null) {
            $this->role = $pRole;
        }
    }
}
?>