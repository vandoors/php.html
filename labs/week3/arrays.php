<?php

$book_titles = [
    "The Hunger Games",
    "Catching Fire",
    "Mockingjay",
    "The Ballad of Songbirds and Snakes",
    "Gone Girl"
];

echo $book_titles[2] . ", " . $book_titles[3];

$books = [
    "The Ballad of Songbirds and Snakes" => "Suzanne Collins",
    "Gone Girl" => "Gillian Flynn",
    "This Is How You Lose the Time War" => "Amal El-Mohtar & Max Gladstone"
];

foreach ($books as $book => $author) {
    echo $book . " by " . $author, PHP_EOL;
}