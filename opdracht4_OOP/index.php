<?php
require_once 'Music.php';
require_once 'Film.php';
require_once 'Game.php';
require_once 'ProductList.php';

// Voorbeeld van het gebruik
$music = new Music("Best of 2023", 10, 0.21, "Top hits", "Various Artists", ["Song 1", "Song 2", "Song 3"]);
$film = new Film("Avengers", 15, 0.21, "Action movie", "Blu-ray");
$game = new Game("Fortnite", 20, 0.21, "Popular game", "Action", "Minimum requirements: ...");

$productList = new ProductList();
$productList->addProduct($music);
$productList->addProduct($film);
$productList->addProduct($game);

$productList->getProductTable();
?>