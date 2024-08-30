<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DashboardTaskController extends Controller
{
	public function index(): View
	{
		$user = Auth::user();
		$tasks = Task::where('user_id', $user->id)->get();
		$categories = Category::all();
		if (request()->has('filterCategory') && request('filterCategory') !== 'all') {
			$tasks = $tasks->where('category_id', request('filterCategory'));
		}
		return view('dashboard', compact('tasks', 'categories'));
	}

	public function create(): View
	{
		$categories = Category::all();
		return view('tasks.create', compact('categories'));
	}

	public function store(TaskStoreRequest $request): RedirectResponse
	{
		$validated = $request->validated();
		$task = new Task(['name' => $validated['name']]);
		$task->user_id = Auth::id();
		$task->save();
		$category = Category::firstOrCreate(['name' => $validated['category']]);
		$task->category()->associate($category);
		$task->save();

		return redirect(route('task.index'));
	}

	public function show(Task $task): View
	{
		return view('tasks.show', compact('task'));
	}

	public function edit(Task $task): View
	{
		$categories = Category::all();
		return view('tasks.edit', compact('task', 'categories'));
	}

	public function update(TaskStoreRequest $request, Task $task): RedirectResponse
	{
		$validated = $request->validated();
		$task->update(['name'=>$validated['name']]);
		$category = Category::firstOrCreate(['name' => $validated['category']]);
		$task->category()->associate($category);
		$task->save();

		return redirect()->route('task.index');
	}

	public function destroy(Task $task): RedirectResponse
	{
		$task->category()->dissociate();
		$task->save();
		$task->delete();
		return redirect()->route('task.index');
	}

	public function complete(Task $task)
	{
		$task->update(['completed' => true]);
		return redirect()->back()->with('status', 'Task marked as completed successfully!');
	}
}
