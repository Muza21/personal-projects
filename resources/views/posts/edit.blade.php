<x-layout>
    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">
        Update the Post
    </div>
    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false"
            placeholder="Title" type="text">
        <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false"
            placeholder="Describe everything about this post here">
        </textarea>

        <div class="buttons flex mt-2">
            <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">
                Cancel
            </div>
            <div
                class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">
                Update
            </div>
        </div>
    </div>
</x-layout>