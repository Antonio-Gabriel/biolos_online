<?php

function sum(...$values)
{
    $base = 0;

    for ($i=0; $i < $values; $i++) {        
        $base += $values[$i];
    }

    return $base;
}

echo sum(1, 2);