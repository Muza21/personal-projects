<div class="flex justify-end items-center space-x-4">
    <a href="{{route('task.edit',$task->id)}}">
        <button type="button"
            class="py-2 px-3 flex items-center justify-center text-sm font-medium text-blue-700 bg-white rounded-lg hover:bg-blue-700 hover:text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewbox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                <path fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </a>
    <a href="{{route('task.show',$task->id)}}">
        <button type="button"
            class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg hover:bg-gray-800 hover:text-white focus:z-10 ">
            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
            </svg>
        </button>
    </a>
    <form method="POST" action="{{route('task.destroy',$task->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
            class="flex items-center bg-white text-red-700 hover:text-white hover:bg-red-800 focus:outline-none  font-medium rounded-lg text-sm px-3 py-2 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewbox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd" />

            </svg>
        </button>
    </form>
</div>