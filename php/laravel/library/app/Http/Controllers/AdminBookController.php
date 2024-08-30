<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminBookController extends Controller
{
	public function index(): View
	{
		$books = Book::all();
		if (request('search')) {
			$searchTerm = '%' . request('search') . '%';
			$books = Book::latest()->where('name', 'like', $searchTerm)
			->orWhereHas('authors', fn ($q) => $q->where('name', 'like', $searchTerm))
			->get();
		}
		return view('dashboard', compact('books'));
	}

	public function create(): View
	{
		return view('books.create');
	}

	public function store(BookStoreRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		$authors = array_map('trim', explode(',', $validated['authors']));

		$authorIds = [];
		foreach ($authors as $authorName) {
			$author = Author::firstOrCreate(['name' => $authorName]);
			$authorIds[] = $author->id;
		}

		$book = Book::create([
			'name'         => $validated['name'],
			'publish_date' => $validated['publish_date'],
			'status'       => $validated['status'],
		]);

		$book->authors()->sync($authorIds);

		return redirect()->route('books.index');
	}

	public function show(Book $book): View
	{
		return view('books.show', [
			'book'    => $book,
			'authors' => $book->authors->pluck('name')->implode(', '),
		]);
	}

	public function edit(Book $book): View
	{
		return view('books.edit', [
			'book'    => $book,
			'authors' => $book->authors->pluck('name')->implode(', '),
		]);
	}

	public function update(BookStoreRequest $request, Book $book)
	{
		$validated = $request->validated();

		$authors = array_map('trim', explode(',', $validated['authors']));

		$authorIds = [];

		foreach ($authors as $authorName) {
			$author = Author::firstOrCreate(['name' => $authorName]);
			$authorIds[] = $author->id;
		}

		$book->update([
			'name'         => $validated['name'],
			'publish_date' => $validated['publish_date'],
			'status'       => $validated['status'],
		]);

		$book->authors()->sync($authorIds);

		return redirect()->route('books.index');
	}

	public function destroy(Book $book)
	{
		$authors = $book->authors;

		foreach ($authors as $author) {
			$book->authors()->detach($author->id);

			if ($author->book()->count() === 0) {
				$author->delete();
			}
		}

		$book->delete();
		return redirect(route('books.index'))->with('success', 'Successfully Deleted');
	}
}
