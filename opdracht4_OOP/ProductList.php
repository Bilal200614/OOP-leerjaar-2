
<?php
//auteur yassine

require_once 'Product.php';

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
