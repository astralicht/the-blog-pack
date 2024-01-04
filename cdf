<?php

if(!isset($argv[1])) {
    echo "Enter a function name.";
    return;
}

$argv[1]();

function serve() {
    exec("php -S 127.0.0.1:8000");
}