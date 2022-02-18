<form method="POST" action="2.php">
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
 * Напишите функцию process_form(), выводящую на экран все параметры переданной на
 * обработку формы и их значения. Можете допустить, что параметры формы имеют только
 * скалярные значения.
 */
function process_form() {
    foreach ($_POST as $key => $value) {
        print "Ключ: ".$key." Значение:".$value."<br/>";
    }
}

process_form();
?>