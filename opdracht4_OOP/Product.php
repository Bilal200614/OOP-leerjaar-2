<?php
abstract class Product {
    protected $naam;
    protected $inkoopprijs;
    protected $btw;
    protected $omschrijving;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving) {
        $this->naam = $naam;
        $this->inkoopprijs = $inkoopprijs;
        $this->btw = $btw;
        $this->omschrijving = $omschrijving;
    }

    abstract public function getProductInfo();

    public function getNaam() {
        return $this->naam;
    }

    abstract public function getCategory();

    abstract public function getVerkoopprijs();
}
