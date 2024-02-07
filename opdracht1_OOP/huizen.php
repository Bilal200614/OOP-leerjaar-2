<?php
 
class House {
    private $floors;
    private $kamers;
    private $kubiek;
 
    public function __construct($floors, $kamers, $kubiek) {
        $this->floors = $floors;
        $this->kamers = $kamers;
        $this->kubiek = $kubiek;
    }
 
    public function calculatePrice() {
        //  berekening van de prijs van kubieke meters
        $pricePerCubicMeter = 1000;
        return $this->kubiek * $pricePerCubicMeter;
    }
 
    public function printDetails() {
        echo "Aantal verdiepingen: " . $this->floors . "<br>";
        echo "Aantal kamers: " . $this->kamers . "<br>";
        echo "Kubieke meters: " . $this->kubiek . "<br>";
        echo "Prijs: €" . $this->calculatePrice() . "<br><br>";
    }
}
// Maak 3 huizen
$house1 = new House(2, 4, 400);
$house2 = new House(1, 3, 192);
$house3 = new House(3, 6, 720);
 
// Print alles van de huizen
$house1->printDetails();
$house2->printDetails();
$house3->printDetails();
 
?>