<?php
function env($name)
{
    $env = parse_ini_file('.env');
    return $env[$name];
}

function setMessage($message)
{
    $_SESSION['message'] = $message;
}

function getMessage()
{
    $message = (isset($_SESSION['message']) ? $_SESSION['message'] : null);
    session_destroy();
    return $message;
}

function redirect($uri = null, $message = null)
{
    setMessage($message);
    header("location: /" . $uri);
}

function responseStdClass($data)
{
    return json_decode(json_encode($data), FALSE);
}
