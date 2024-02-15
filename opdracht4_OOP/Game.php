<?php
require_once 'Product.php';

class Game extends Product {
    protected $genre;
    protected $minimaleHardwareEisen;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $genre, $minimaleHardwareEisen) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->genre = $genre;
        $this->minimaleHardwareEisen = $minimaleHardwareEisen;
    }

    public function getProductInfo() {
        return "Game: {$this->naam}, Genre: {$this->genre}, Minimale Hardware Eisen: {$this->minimaleHardwareEisen}";
    }

    public function getCategory() {
        return "Game";
    }

    public function getVerkoopprijs() {
        // Implementeer hier de formule voor verkoopprijs indien nodig
        return $this->inkoopprijs * (1 + $this->btw) + 2.5;
    }
}
