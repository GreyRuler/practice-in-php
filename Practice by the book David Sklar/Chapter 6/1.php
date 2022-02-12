<?php
/**
 * Создайте класс Ingredient. Каждый экземпляр этого класса должен представлять отдельный
 * ингредиент блюда, а также отслеживать наименование ингредиента и его стоимость.
 */
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
        print "1.php";
        return $this->price;
    }
}
// $apple = new Ingredient("Яблоко", 40);
// echo $apple->getName();
// echo $apple->getPrice();
?>