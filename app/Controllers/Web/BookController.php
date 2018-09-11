<?php

namespace App\Controllers\Web;


use App\Controllers\BaseController;
use App\Models\Book;
use Gumlet\ImageResize;
use Infrastructure\Authentication;

class BookController extends BaseController
{
    const BOOK_IMAGE_PATH = __DIR__ . '/../../../html/images/';


    private function getFileExtensionByContentType($contentType) : string {
        if ($contentType === 'image/png') {
            return 'png';
        }
        else if ($contentType === 'image/jpeg') {
            return 'jpg';
        }
        return '';
    }

    public function showContact()
    {
        $book = new Book();

        $viewModel = [
            'pageTitle' => "Contact",
            'books' => $book->all(),
            'authors' => $book->authors(),
            'categories'=> $book->categories(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()
        ];

        $this->renderWebView('/Books/contact', $viewModel);
    }

    public function index()
    {
        $book = new Book();

        $viewModel = [
            'pageTitle' => "Book Catalog",
            'authors' => $book->authors(),
            'categories'=> $book->categories(),
            'books' => $book->getTopFiveBooks(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()
        ];

        $this->renderWebView('/Books/start-page', $viewModel);
    }

    public function allBooks()
    {
        $book = new Book();

        $viewModel = [
            'pageTitle' => "Book Catalog",
            'books' => $book->all(),
            'authors' => $book->authors(),
            'categories'=> $book->categories(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()
        ];

        $this->renderWebView('/Books/all-books', $viewModel);
    }

    public function show($id = 0)
    {
        $book = new Book();

        $imagePath = '';
        if (file_exists(__DIR__ . '/../../../html/images/' . $id . '.jpg')) {
            $imagePath = 'images/' . $id . '.jpg';
        }

        $viewModel = [
            'pageTitle' => "Books",
            'book' => $book->one($id),
            'errors' => $this->getErrors(),
            'authors' => $book->authors(),
            'categories'=> $book->categories(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile(),
            'imagePath' => $imagePath
        ];

        $this->renderWebView('/Books/details', $viewModel);
    }
 public function edit($id = 0)
    {
        $book = new Book();

        $viewModel = [
            'pageTitle' => "Edit book",
            'book' => $book->one($id),
            'authors' => $book->authors(),
            'categories'=> $book->categories(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile(),
        ];


        $this->renderWebView('/Books/update-book', $viewModel);
    }

    public function create()
    {
        $book = new Book();

        $viewModel = [
                'pageTitle' => "Create a book",
                'authors' => $book->authors(),
                'categories'=> $book->categories(),
                'errors' => $this->getErrors(),
                'messages' => $this->getMessages(),
                'profile' => Authentication::getProfile()
            ];

        $this->renderWebView('/Books/new-book', $viewModel);
    }

    public function update($fields = [], $id = 0)
    {
        $book = new Book();
        $id = $book->save($fields,$id);
        $this->addMessage('Book succesfully updated');
        header("Location: ?route=show&id={$id}");
        exit;
    }

    public function store($fields = [])
    {
        $book = new Book();
        $id = $book->save($fields);
        header("Location: ?route=show&id={$id}");
        exit;
    }

    public function destroy($id =0)
    {

    }

    public function uploadImage($id) : void
    {
        $imageFile = $_FILES['imageFile'] ?? null;

        if (!$imageFile || $imageFile['error'] > 0) {
            $this->addError('There was an error while extracting the image');
            header('Location: ?route=show&id=' . $id);
        }
        else if (!in_array($imageFile['type'],array('image/png','image/jpeg'))) {
            $this->addError('The supplied image was not of type PNG or JPEG');
            header('Location: ?route=show&id=' . $id);
        }
        else {
            $bookModel = new Book();
            $book = $bookModel->one($id);

            if ($book['image_filename'] && file_exists(self::BOOK_IMAGE_PATH . $book['image_filename'])) {

                $old = getcwd();
                chdir(self::BOOK_IMAGE_PATH);
                unlink($book['image_filename']);
                chdir($old);

            }
            /*unlink(self::BOOK_IMAGE_PATH . $book['image_filename']);
         */

            $fileName = $id . '.' . $this->getFileExtensionByContentType($imageFile['type']);

            $targetFile = self::BOOK_IMAGE_PATH . $fileName;

            try {
                $image = new ImageResize($imageFile['tmp_name']);
                $image->resizeToWidth(500);
                $image->save($targetFile);
            }
            catch (Exception $exception) {
                $this->addError('There was an error during the converting of the image');
                header('Location: ?route=show&id=' . $id);
                return;
            }

            $book = new Book();
            $book->changeImageFileName($id,$fileName);

            unlink($imageFile['tmp_name']);

            $this->addMessage('Image successfully uploaded');
            header('Location: ?route=show&id=' . $id);
        }
    }

//    public function allAuthors()
//
//    {
//        $author = new Book();
//
//        $viewModel = [
//            'pageTitle' => "Biography",
//            'authors' => $author->authors(),
//            'categories'=> $author->categories(),
//            'errors' => $this->getErrors(),
//            'messages' => $this->getMessages(),
//            'profile' => Authentication::getProfile()
//        ];
//
//        $this->renderWebView('/Books/author-details', $viewModel);
//    }


    public function oneAuthor($id=0)

    {
        $author = new Book();

        $viewModel = [
            'pageTitle' => "Biography",
            'author' => $author->oneAuthor($id),
            'books' => $author->all(),
            'authors' => $author->authors(),
            'categories'=> $author->categories(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()
        ];

        $this->renderWebView('/Books/author', $viewModel);
    }

    public function allCategories($id = 0)

    {
        $category = new Book();


        $viewModel = [
            'pageTitle' => "Category",
            'categories'=> $category->categories(),
            'books' => $category->all(),
            'authors' => $category->authors(),
            'category' => $category->getCategoryById($id),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()

        ];

        view('/Books/categories', $viewModel);
    }

    public function oneCategory($id = 0)

    {
        $category = new Book();


        $viewModel = [
            'pageTitle' => "Category",
            'categories'=> $category->categories(),
            'category' => $category->getCategoryById($id),
            'books' => $category->all(),
            'authors' => $category->authors(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()

        ];

        view('/Books/category', $viewModel);
    }

}