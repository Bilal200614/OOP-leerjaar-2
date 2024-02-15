<?php
require_once 'Product.php';

class Music extends Product {
    protected $artiest;
    protected $nummers;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $artiest, $nummers) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->artiest = $artiest;
        $this->nummers = $nummers;
    }

    public function getProductInfo() {
        return "Muziek: {$this->naam}, Artiest: {$this->artiest}, Nummers: " . implode(", ", $this->nummers);
    }

    public function getCategory() {
        return "Music";
    }

    public function getVerkoopprijs() {
        // Implementeer hier de formule voor verkoopprijs indien nodig
        return $this->inkoopprijs * (1 + $this->btw) + 0.5;
    }
}
