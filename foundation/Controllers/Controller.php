<?php

namespace Foundation\Controllers;

abstract class Controller
{
    protected $data;
    protected $message;

    protected function view($view, $data = null)
    {
        $this->data = $data;
        $this->message = getMessage();

        if ($view == '404') {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/foundation/Views/' . $view . '.php';
        } else {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/resources/views/' . $view . '.php';
        }
    }

    function redirect($uri = null, $message = null)
    {
        setMessage($message);
        header("location: /" . $uri);
    }
}
