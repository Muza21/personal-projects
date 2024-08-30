<x-layout>
    <div class="p-10">
        <div class="max-w-sm m-auto rounded overflow-hidden shadow-xl border border-solid">
            <img class="w-full" src="{{url('./images/tasks.png')}}" alt="task">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Task</div>
                <p class="text-gray-700 text-base">
                    {{$task->name}}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    {{$task->category->name}}
                </span>
            </div>
        </div>
    </div>
</x-layout>