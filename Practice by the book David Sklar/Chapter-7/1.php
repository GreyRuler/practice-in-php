<form method="POST" action="1.php">
    Braised Noodles with: <select name="noodle">
        <option>crab meat</option>
        <option>mushroom</option>
        <option>barbecued pork</option>
        <option>shredded ginger and green onion</option>
    </select>
    <br/>
    Sweet: <select name="sweet[]" multiple>
        <option value="puff"> Sesame Seed Puff
        <option value="square"> Coconut Milk Gelatin Square
        <option value="cake"> Brown Sugar Cake
        <option value="ricemeat"> Sweet Rice and Meat
    </select>
    <br/>
    Sweet Quantity: <input type="text" name="sweet_q">
    <br/>
    <input type="submit" name="submit" value="Order">
</form>
<?php
/**
 * Что будет содержать массив $_POST после передачи на обработку приведенной ниже формы,
 * где выбран третий элемент из списка Braised Noodles (Тушеное мясо с лапшой), первый и
 * последний элементы из списка Sweet (Сладкое), а в текстовом поле введено значение 4?
 */
if (isset($_POST['noodle'])) {
    print $_POST['noodle']."<br/>";
}
if (isset($_POST['sweet'])) {
    foreach ($_POST['sweet'] as $choice) {
        print $choice."<br/>";
    }
}
print $_POST['sweet_q']."<br/>";
print $_POST['submit']."<br/>";
?>