<?php

namespace Foundation\Controllers;

use Foundation\Controllers\Controller;

class NotFoundController extends Controller
{
    public function get404()
    {
        $this->view('404');
    }
}
