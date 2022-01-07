<?php

function url($endPoint)
{
    //echo $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "bioloOnline" . "/";
    return header("Location: http://localhost/bioloOnline/{$endPoint}");
}

// Format price
function formatNumber($num): string
{
    return (float)number_format(
        $num,
        2,
        ".",
        ","
    );
}
