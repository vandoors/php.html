<?php

class Car {}

$boolean = true;
$integer = 123;
$integer_negative = -13;
$float_double = 12.35;
$string = "Hello World";
$array = array('one', 'fish', 'two', 'fish', 'red', 'fish');
$object = new Car();
$null = NULL;
?>

<table border="1px solid;">
    <tr>
        <th>Type</th>
        <th>Value</th>
        <th>gettype() response</th>
    </tr>
    <tr>
        <td>Boolean</td>
        <td><?= $boolean ?></td>
    </tr>
</table>
