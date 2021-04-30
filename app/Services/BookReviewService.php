<?php

namespace App\Services;

use App\Repositories\BookReviewRepository;

class BookReviewService
{
    protected $bookReviewRepository;

    public function __construct()
    {
        $this->bookReviewRepository = new BookReviewRepository;
    }

    public function create($data)
    {
        $this->bookReviewRepository->create($data);

        redirect('info?id=' . $data['book_id'], "Review by " . $data['posted_by'] . " added");
    }

    public function delete($id)
    {
        if (!isset($id)) redirect();

        $book_review_data = [
            'id' => $id
        ];

        $book_reviews = $this->bookReviewRepository->getWhere($book_review_data);

        if ($book_reviews->rowCount() == 0) redirect();

        $data = $book_reviews->fetch();

        $this->bookReviewRepository->delete($book_review_data);

        redirect('info?id=' . $data['book_id'], "Review " . $data['posted_by'] . " deleted");
    }
}
