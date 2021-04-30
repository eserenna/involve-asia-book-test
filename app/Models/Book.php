<?php

namespace App\Models;

use Foundation\Model;

class Book extends Model
{
    public function __construct()
    {
        parent::__construct("books");
    }
}
