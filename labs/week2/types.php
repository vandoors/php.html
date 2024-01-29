<?php

class Album {}

$boolean = false;
$integer = 13;
$integer_negative = -22;
$float_double = 19.89;
$string = "hi world";
$array = array('debut', 'fearless', 'speak now', 'red', '1989', 'reputation', 'lover', 'folklore', 'evermore', 'midnights');
$object = new Album();
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
        <td><?= gettype($boolean); ?></td>
    </tr>
    <tr>
        <td>Integer</td>
        <td><?= $integer ?></td>
        <td><?= gettype($integer); ?></td>
    </tr>
    <tr>
        <td>Integer (negative)</td>
        <td><?= $integer_negative ?></td>
        <td><?= gettype($integer_negative); ?></td>
    </tr>
    <tr>
        <td>Float</td>
        <td><?= $float_double ?></td>
        <td><?= gettype($float_double); ?></td>
    </tr>
    <tr>
        <td>String</td>
        <td><?= $string ?></td>
        <td><?= gettype($string); ?></td>
    </tr>
    <tr>
        <td>Array</td>
        <td><?= implode(',', $array) ?></td>
        <td><?= gettype($array); ?></td>
    </tr>
    <tr>
        <td>Object</td>
        <td><?php print_r($object); ?></td>
        <td><?= gettype($object); ?></td>
    </tr>
    <tr>
        <td>Null</td>
        <td><?php print_r($null); ?></td>
        <td><?= gettype($null); ?></td>
    </tr>
</table>
