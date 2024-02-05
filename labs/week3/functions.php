<?php

function addTwoNumbers($num1, $num2)
{
    return $num1 + $num2;
}

function subtractTwoNumbers($num1, $num2)
{
    return $num1 - $num2;
}

function multiplyTwoNumbers($num1, $num2)
{
    return $num1 * $num2;
}

function divideTwoNumbers($num1, $num2)
{
    return $num1 / $num2;
}

echo addTwoNumbers(1, 3) . "<br>";
echo subtractTwoNumbers(1, 3) . "<br>";
echo multiplyTwoNumbers(1, 3) . "<br>";
echo divideTwoNumbers(1, 3) . "<br>";

echo "<br>";

function determineSalesTax($price, $tax_rate)
{
    return $price * $tax_rate;
}

$costOfItem = 100;
$pretendTaxRate = 0.07;
echo "Sales tax on your $" . $costOfItem . " item, taxed at " . $pretendTaxRate * 100 . "%, is $" . determineSalesTax($costOfItem, $pretendTaxRate);