<x-layout>
    <section class="grid min-h-screen place-items-center bg-emerald-500 p-16">
        <div class="w-[600px] rounded-md bg-emerald-300 p-4 pt-0 shadow-lg">
            <div class="p-6">
                <h5 class="mb-10 text-xl text-center font-medium leading-tight text-emerald-950">
                    {{$book->name}}
                </h5>
                <div class="flex justify-between w-full text-base text-emerald-950">
                    <span>Authors: </span>
                    <span>{{$authors}}</span>
                </div>
            </div>
            <ul class="w-full mb-8">
                <li class="flex justify-between w-full text-emerald-950 px-6 py-3">
                    <span>Publish Date: </span>
                    <span>{{$book->publish_date}}</span>
                </li>
                <li class="flex justify-between text-emerald-950 w-full px-6 py-3">
                    <span>Status: </span>
                    <span>{{$book->status}}</span>
                </li>

            </ul>
            <a href="{{route('books.index')}}">
                <x-button type="submit" class="w-full bg-emerald-700 text-emerald-100 hover:bg-emerald-800">
                    <p>Go Back</p>
                </x-button>
            </a>
        </div>
    </section>
</x-layout>