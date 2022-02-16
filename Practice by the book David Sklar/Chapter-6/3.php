<?php
/**
 * Создайте подкласс, производный от представленного в этой главе класса Entree. Этот под-
 * класс должен принимать объекты типа Ingredient вместо символьной строки с наимено-
 * ваниями ингредиентов для их обозначения. Введите в этот подкласс метод, возвращающий
 * общую стоимость блюда.
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
        return $this->price;
    }

    public function setPrice($price) {
        $this->price=$price;
    }
}

class Entree {
    protected $ingredients = array();

    public function __construct($ingredients) {
        if (!is_array($ingredients)) {
            throw new Exception('$ingredients must be an array');
        }
        $this->ingredients = $ingredients;
    }

    public function getPriceIngredients() {
        $totalPrice = 0;
        foreach ($this->ingredients as $ingredient) {
            $totalPrice += $ingredient->getPrice();
        }
        return $totalPrice;
    }
}

$apple = new Ingredient("Яблоко", 40);
$honey = new Ingredient("Мёд", 100);
$raspberry = new Ingredient("Малина", 80);
$ingredient = new Entree([$apple, $honey, $raspberry]);
print $ingredient->getPriceIngredients();
?>