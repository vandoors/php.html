<?php

function calculateCalories($W, $A, $gender, $T, $HR)
{
    if ($gender == 'M')
    {
        return ((-55.0969 + (0.6309 * $HR) + (0.090174 * $W) + (0.2017 * $A)) / 4.184) * $T;
    }
    else if ($gender == 'F')
    {
        return ((-20.4022 + (0.4472 * $HR) - (0.057288 * $W) + (0.074 * $A)) / 4.184) * $T;
    }
    else if ($gender == 'N')
    {
        return ((-37.7495 + (0.5391 * $HR) + (0.01644 * $W) + (0.1379 * $A)) / 4.184) * $T;
    }
    else
    {
        return 0;
    }
}