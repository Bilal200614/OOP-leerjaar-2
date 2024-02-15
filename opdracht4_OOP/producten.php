<?php
// Stap 1: Abstracte class Product
abstract class Product {
    protected $Naam;
    protected $inkoopprijs;
    protected $btw;
    protected $omschrijving;

    public function __construct($Naam, $inkoopprijs, $btw, $omschrijving) {
        $this->Naam = $Naam;
        $this->inkoopprijs = $inkoopprijs;
        $this->btw = $btw;
        $this->omschrijving = $omschrijving;
    }

    // Abstracte methode voor productinformatie
    abstract public function getProductInfo();
}

// Stap 2: Child classes Music, Film en Game
class Music extends Product {
    protected $artiest;
    protected $nummers;

    public function __construct($Naam, $inkoopprijs, $btw, $omschrijving, $artiest, $nummers) {
        parent::__construct($Naam, $inkoopprijs, $btw, $omschrijving);
        $this->artiest = $artiest;
        $this->nummers = $nummers;
    }

    // Implementatie van de abstracte methode
    public function getProductInfo() {
        return "Muziek: {$this->Naam}, Artiest: {$this->artiest}, Nummers: " . implode(", ", $this->nummers);
    }
}

class Film extends Product {
    protected $kwaliteit;

    public function __construct($Naam, $inkoopprijs, $btw, $omschrijving, $kwaliteit) {
        parent::__construct($Naam, $inkoopprijs, $btw, $omschrijving);
        $this->kwaliteit = $kwaliteit;
    }

    // Implementatie van de abstracte methode
    public function getProductInfo() {
        return "Film: {$this->Naam}, Kwaliteit: {$this->kwaliteit}";
    }
}

class Game extends Product {
    protected $genre;
    protected $minimaleHardwareEisen;

    public function __construct($Naam, $inkoopprijs, $btw, $omschrijving, $genre, $minimaleHardwareEisen) {
        parent::__construct($Naam, $inkoopprijs, $btw, $omschrijving);
        $this->genre = $genre;
        $this->minimaleHardwareEisen = $minimaleHardwareEisen;
    }

    // Implementatie van de abstracte methode
    public function getProductInfo() {
        return "Game: {$this->Naam}, Genre: {$this->genre}, Minimale Hardware Eisen: {$this->minimaleHardwareEisen}";
    }
}

// Stap 3: Class ProductList
class ProductList {
    private $producten = array();

    public function addProduct(Product $product) {
        $this->producten[] = $product;
    }

    public function getProductTable() {
        echo "<table border='1'>
                <tr>
                    <th>Naam van product</th>
                    <th>Categorie</th>
                    <th>Verkoopprijs</th>
                    <th>Informatie over het product</th>
                </tr>";

        foreach ($this->producten as $product) {
            echo "<tr>
                    <td>{$product->getNaam()}</td>
                    <td>{$product->getCategory()}</td>
                    <td>{$product->getVerkoopprijs()}</td>
                    <td>{$product->getProductInfo()}</td>
                </tr>";
        }

        echo "</table>";
    }
}

// Voorbeeld van het gebruik
$music = new Music("Best of 2023", 10, 0.21, "Top hits", "Various Artists", ["Song 1", "Song 2", "Song 3"]);
$film = new Film("Avengers", 15, 0.21, "Action movie", "Blu-ray");
$game = new Game("Fortnite", 20, 0.21, "Battle Royale", "Shooter", "Minimaal 8GB RAM, NVIDIA GTX 1060");

$productList = new ProductList();
$productList->addProduct($music);
$productList->addProduct($film);
$productList->addProduct($game);

$productList->getProductTable();
?>
