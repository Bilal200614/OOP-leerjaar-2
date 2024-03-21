<?php
namespace Opdracht7\classes;

class Group
{
    private string $name;

    public function __construct(string $pName)
    {
        $this->name = $pName;
    }

    public function GetName()
    {
        return $this->name;
    }
}
?>