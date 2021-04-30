<?php

namespace App\Services;

use App\Repositories\BookRepository;
use App\Repositories\BookReviewRepository;

class BookService
{
    protected $bookRepository;
    protected $bookReviewRepository;

    public function __construct()
    {
        $this->bookRepository = new BookRepository;
        $this->bookReviewRepository = new BookReviewRepository;
    }

    public function getAll()
    {
        $data = $this->bookRepository->getAll();

        return responseStdClass($data->fetchAll());
    }

    public function getById($id)
    {
        if (!isset($id)) redirect();

        $where = [
            'id' => $id
        ];

        $book = $this->bookRepository->getWhere($where);

        if ($book->rowCount() == 0) redirect();

        $data = $book->fetch();

        return responseStdClass($data);
    }

    public function getByIdWithReviews($id)
    {
        if (!isset($id)) redirect();

        $book_data = [
            'id' => $id
        ];

        $book = $this->bookRepository->getWhere($book_data);

        if ($book->rowCount() == 0) redirect();

        $book_review_data = [
            'book_id' => $id
        ];

        $reviews = $this->bookReviewRepository->getWhere($book_review_data);

        $data = $book->fetch();
        $data['reviews'] = $reviews->fetchAll();

        return responseStdClass($data);
    }

    public function create($data)
    {
        $this->bookRepository->create($data);

        redirect('add', "Book " . $data['title'] . " added");
    }

    public function update($data, $id)
    {
        $this->bookRepository->update($data, $id);

        redirect('update?id=' . $id, "Book updated");
    }

    public function delete($id)
    {
        if (!isset($id)) redirect();

        $book_reviews_data = [
            'book_id' => $id
        ];

        $book_data = [
            'id' => $id
        ];

        // select
        $book = $this->bookRepository->getWhere($book_data);

        if ($book->rowCount() == 0) redirect();

        $data = $book->fetch();

        // delete
        $this->bookReviewRepository->delete($book_reviews_data);
        $this->bookRepository->delete($book_data);

        redirect(null, "Book " . $data['title'] . " deleted");
    }
}
