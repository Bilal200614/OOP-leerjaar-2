<?php
namespace Opdracht7_OOP\classes;

class Group
{
    private string $name;
    public function GetName()
    {
        return $this->name;
    }

    public function __construct(string $pName)
    {
        $this->name = $pName;
    }
    
}
?>