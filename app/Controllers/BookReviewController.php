<?php

namespace App\Controllers;

use Foundation\Controllers\Controller;
use App\Services\BookReviewService;

class BookReviewController extends Controller
{
    protected $bookReviewService;

    public function __construct()
    {
        $this->bookReviewService = new BookReviewService;
    }

    public function postAdd()
    {
        $id = $_POST['id'];

        $data = [
            'review' => $_POST['review'],
            'posted_by' => $_POST['posted_by'],
            'book_id' => $id
        ];

        $this->bookReviewService->create($data);
    }

    public function postDelete()
    {
        $id = $_GET['id'];

        $this->bookReviewService->delete($id);
    }
}
