<x-layout>
  <form method="POST" action="{{route('logout.user')}}">
    @csrf
    <button
      class="flex items-center justify-center text-white bg-blue-500  hover:bg-blue-700 focus:outline-none font-medium rounded-lg text-sm px-4 py-2"
      type="submit">
      <p>Log Out</p>
    </button>
  </form>
  <section class="p-3 sm:p-5 antialiased">
    <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
      <div class="bg-sky-300 relative shadow-md sm:rounded-lg overflow-hidden">
        <div
          class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-b border-emerald-800">
          <div class="w-full md:w-1/2">
            <form method="GET" action="#" class="flex items-center">
              <div class="mb-4">
                <label for="filterCategory" class="text-sm font-medium text-gray-700">Filter by Category:</label>
                <div class="mt-1">
                  <select id="filterCategory" name="filterCategory"
                    class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    onchange="this.form.submit()">
                    <option value="all" {{ request('filterCategory')=='all' ? 'selected' : '' }}>All</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('filterCategory')==$category->id ? 'selected' : ''
                      }}>
                      {{ $category->name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </form>
          </div>
          <div
            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <a href="{{route('task.create')}}">
              <button type="button" id="createProductButton" data-modal-toggle="createProductModal"
                class="flex items-center justify-center text-white bg-blue-500  hover:bg-blue-700 focus:outline-none font-medium rounded-lg text-sm px-4 py-2">
                <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Create a Task
              </button>
            </a>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-emerald-950">
            <thead class="text-xs text-emerald-950 uppercase">
              <tr>
                <th scope="col" class="p-4">
                  
                </th>
                <th scope="col" class="p-4">Category</th>
                <th scope="col" class="p-4">Task</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tasks as $task)
              <tr
                class="{{ $task->completed ? 'line-through bg-green-700' : '' }} border-b border-emerald-800 hover:bg-emerald-400">
                <td class="px-4 py-3 font-medium text-emerald-950 whitespace-nowrap">
                  <form method="POST" action="{{route('task.complete',$task->id)}}">
                    @csrf
                    <button type="submit"
                      class=" flex items-center bg-sky-500 text-gray-950 hover:text-white hover:bg-sky-800 focus:outline-none  font-medium rounded-lg text-sm px-3 py-2 text-center {{ $task->completed ? 'bg-green-500' : '' }}"
                      @if($task->completed) disabled @endif>
                      <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </button>
                  </form>
                </td>
                <td class="px-4 py-3 font-medium text-emerald-950 whitespace-nowrap">
                  {{$task->category->name}}
                </td>
                <td class="px-4 py-3 font-medium text-emerald-950 whitespace-nowrap">
                  {{$task->name}}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                  <x-crud-buttons :task=$task />
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</x-layout>