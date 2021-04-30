<?php

namespace App\Repositories;

use App\Models\BookReview;

class BookReviewRepository
{
    protected $book;

    public function __construct()
    {
        $this->bookReview = new BookReview;
    }

    public function getAll()
    {
        return $this->bookReview->select();
    }

    public function getWhere($where)
    {
        return $this->bookReview->select($where);
    }

    public function create($data)
    {
        $this->bookReview->insert($data);
    }

    public function update($data, $id)
    {
        $this->bookReview->update($data, $id);
    }

    public function delete($data)
    {
        $this->bookReview->delete($data);
    }
}
