<?php

$book_titles = [
    "The Hunger Games",
    "Catching Fire",
    "Mockingjay",
    "The Ballad of Songbirds and Snakes",
    "Gone Girl"
];

echo $book_titles[2] . ", " . $book_titles[3];

echo "<br><br>";

$books = [
    "The Ballad of Songbirds and Snakes" => "Suzanne Collins",
    "Gone Girl" => "Gillian Flynn",
    "This Is How You Lose the Time War" => "Amal El-Mohtar & Max Gladstone"
];

// foreach, chapter 9 exercise 2
foreach ($books as $book => $author) {
    echo $book . " by " . $author . "<br>";
}

echo "<br>";

$books += ["Beach Read" => "Emily Henry"];
print_r($books);

echo "<br><br>";

echo count($books);

echo "<br><br>";

asort($books); // doesn't seem to properly sort ¯\_(ツ)_/¯
print_r($books);