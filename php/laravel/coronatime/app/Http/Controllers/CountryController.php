<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\View\View;

class CountryController extends Controller
{
	public function index(): View
	{
		return view('dashboard', $this->sumAll('name'));
	}

	public function sortByColumn($columnName): View
	{
		if (request('search'))
		{
			$countries = Country::latest()
			->where('name->en', 'like', '%' . request('search') . '%')
			->orwhere('name->ka', 'like', '%' . request('search') . '%')->get();
			$sort = request('sort', 'asc');
			return view('by-country', compact('countries', 'sort'), $this->sumAll($columnName));
		}
		$countries = $this->sortBy($columnName, request('sort', 'asc'));
		return view('by-country', $countries, $this->sumAll($columnName));
	}

	public function sortBy(string $columnName, $sort): array
	{
		$countries = Country::all()->sortBy($columnName, ($columnName == 'name' ? SORT_LOCALE_STRING : SORT_REGULAR), $sort === 'desc');
		return compact('countries', 'sort');
	}

	public function sumAll($columnName): array
	{
		return [
			'column'           => $columnName,
			'new_cases'        => number_format(Country::sum('new_cases')),
			'recovered'        => number_format(Country::sum('recovered')),
			'deaths'           => number_format(Country::sum('deaths')),
		];
	}
}
