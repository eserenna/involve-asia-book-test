<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    protected $book;

    public function __construct()
    {
        $this->book = new Book;
    }

    public function getAll()
    {
        return $this->book->select();
    }

    public function getWhere($where)
    {
        return $this->book->select($where);
    }

    public function create($data)
    {
        $this->book->insert($data);
    }

    public function update($data, $id)
    {
        $this->book->update($data, $id);
    }

    public function delete($data)
    {
        $this->book->delete($data);
    }
}
