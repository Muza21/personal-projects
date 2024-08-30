<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Contracts\View\View;

class AdminAuthorController extends Controller
{
	public function index(): View
	{
		$authors = Author::all();
		return view('authors.list', compact('authors'));
	}
}
