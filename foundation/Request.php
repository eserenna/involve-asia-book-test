<?php
function getUri()
{
    return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
}

function getMethod()
{
    return $_SERVER['REQUEST_METHOD'];
}
