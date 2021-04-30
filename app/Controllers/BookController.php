<?php

namespace App\Controllers;

use Foundation\Controllers\Controller;
use App\Services\BookService;

class BookController extends Controller
{
    protected $book_review;
    protected $bookService;

    public function __construct()
    {
        $this->bookService = new BookService;
    }

    public function getList()
    {
        $data = $this->bookService->getAll();

        $this->view('list-book', $data);
    }

    public function getAdd()
    {
        $this->view('add-book');
    }

    public function getUpdate()
    {
        $id = $_GET['id'];

        $data = $this->bookService->getById($id);

        $this->view('update-book', $data);
    }

    public function getInfo()
    {
        $id = $_GET['id'];

        $data = $this->bookService->getByIdWithReviews($id);

        $this->view('info-book', $data);
    }

    public function postAdd()
    {
        $data = [
            'title' => $_POST['title'],
            'year_published' => $_POST['year_published'],
            'author_name' => $_POST['author_name']
        ];

        $this->bookService->create($data);
    }

    public function postUpdate()
    {
        $id = $_POST['id'];

        $data = [
            'title' => $_POST['title'],
            'year_published' => $_POST['year_published'],
            'author_name' => $_POST['author_name']
        ];

        $this->bookService->update($data, $id);
    }

    public function postDelete()
    {
        $id = $_GET['id'];

        $this->bookService->delete($id);
    }
}
