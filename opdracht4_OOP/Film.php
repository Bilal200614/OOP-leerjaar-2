<?php
require_once 'Product.php';

class Film extends Product {
    protected $kwaliteit;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $kwaliteit) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->kwaliteit = $kwaliteit;
    }

    public function getProductInfo() {
        return "Film: {$this->naam}, Kwaliteit: {$this->kwaliteit}";
    }

    public function getCategory() {
        return "Film";
    }

    public function getVerkoopprijs() {
        // Implementeer hier de formule voor verkoopprijs indien nodig
        return $this->inkoopprijs * (1 + $this->btw) + 1.5;
    }
}
