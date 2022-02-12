<?php
/**
 * Введите в свой новый класс Ingredient метод, изменяющий стоимость ингредиента блюда.
 */
namespace Tiny;

class Ingredient {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        print "2.php";
        return $this->price;
    }

    public function setPrice($price) {
        $this->price=$price;
    }
}
// $apple = new \Tiny\Ingredient("Яблоко", 40);
// $apple->setPrice(50);
// print $apple->getPrice();
?>