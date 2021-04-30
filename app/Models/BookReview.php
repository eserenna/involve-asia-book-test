<?php

namespace App\Models;

use Foundation\Model;

class BookReview extends Model
{
    public function __construct()
    {
        parent::__construct("book_reviews");
    }
}
