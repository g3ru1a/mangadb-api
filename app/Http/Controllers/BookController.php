<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Review;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookController extends Controller
{
    /**
     * Create controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Book::class, 'book');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return BookResource::collection(Book::approvedOnly());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookRequest $request
     * @return BookResource
     */
    public function store(StoreBookRequest $request): BookResource
    {
        $data = [
            'name' => htmlspecialchars($request->input('name')),
            'summary' => htmlspecialchars($request->input('summary')),
            'number' => htmlspecialchars($request->input('number')),
            'isbn_10' => htmlspecialchars($request->input('isbn_10')),
            'isbn_13' => htmlspecialchars($request->input('isbn_13')),
            'page_count' => htmlspecialchars($request->input('page_count')),
            'release_date' => htmlspecialchars($request->input('release_date')),
            'series_type_id' => htmlspecialchars($request->input('series_type_id')),
            'publisher_id' => htmlspecialchars($request->input('publisher_id')),
            'language_id' => htmlspecialchars($request->input('language_id')),
            'binding_id' => htmlspecialchars($request->input('binding_id')),
        ];
        $data['release_date'] = date('Y-m-d', strtotime($data['release_date']));
        $cover = $request->file('cover');
        //
        $book = Book::create($data);
        $media = MediaController::upload($cover, 'book_cover',
            'book_covers', $book->id);
        if($media) $book->media()->save($media);
        ReviewController::create(Auth::user(), $book);
        return BookResource::make($book);
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return BookResource
     */
    public function show(Book $book): BookResource
    {
        return BookResource::make($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBookRequest $request
     * @param Book $book
     * @return BookResource
     */
    public function update(UpdateBookRequest $request, Book $book): BookResource
    {
        $data = [
            'name' => htmlspecialchars($request->input('name')) ?? $book->name,
            'summary' => htmlspecialchars($request->input('summary')) ?? $book->summary,
            'number' => htmlspecialchars($request->input('number')) ?? $book->number,
            'isbn_10' => htmlspecialchars($request->input('isbn_10')) ?? $book->isbn_10,
            'isbn_13' => htmlspecialchars($request->input('isbn_13')) ?? $book->isbn_13,
            'page_count' => htmlspecialchars($request->input('page_count')) ?? $book->page_count,
            'release_date' => htmlspecialchars($request->input('release_date')) ?? $book->release_date,
            'series_type_id' => htmlspecialchars($request->input('series_type_id')) ?? $book->series_type_id,
            'publisher_id' => htmlspecialchars($request->input('publisher_id')) ?? $book->publisher_id,
            'language_id' => htmlspecialchars($request->input('language_id')) ?? $book->language_id,
            'binding_id' => htmlspecialchars($request->input('binding_id')) ?? $book->binding_id,
        ];
        $data['release_date'] = date('Y-m-d', strtotime($data['release_date']));
        $cover = $request->file('cover');
        //
        $book_new = Book::create($data);
        if($cover != null){
            $media = MediaController::upload($cover, 'book_cover',
                'book_covers', $book->id);
        }else{
            $media = $book->media ? $book->media->replicate() : null;
        }
        $book_new->media()->save($media);
        ReviewController::create(Auth::user(), $book_new, $book);
        return BookResource::make($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return BookResource
     */
    public function destroy(Book $book): BookResource
    {
        $book->delete();
        return BookResource::make($book);
    }
}
