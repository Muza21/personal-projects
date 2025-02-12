<x-layout>
    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Jese Leos</a>
                            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                        </div>
                    </div>
                </address>
                <h3 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Best practices for successful prototypes</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, dolores aperiam! Inventore, saepe praesentium! Aspernatur, impedit, aperiam porro dolores animi quibusdam, non est perspiciatis maxime incidunt dolorem debitis eius odio!
                Quidem impedit quam vero officia facere, natus placeat porro alias perferendis totam eligendi error? Quos, sunt! Voluptas ab at ipsa ex repellendus, nemo deserunt amet doloribus asperiores, perspiciatis, voluptatibus reiciendis.
                Quod minima tempora numquam mollitia, molestias quisquam repellendus alias odit, debitis nostrum, quia ut! Omnis voluptatum sed molestiae mollitia quo, unde nulla similique, aspernatur, minima libero ad at iure tempore.
                Nulla delectus corrupti magni quaerat debitis nostrum eum consequatur perspiciatis velit quis aliquam veritatis repellat, impedit voluptatum nam ullam animi aliquid minus asperiores accusantium aut voluptatem? Dolorum repellat magni placeat.
                Vero quae perspiciatis deserunt commodi necessitatibus ullam earum reprehenderit, id dolorem suscipit maxime sint placeat quas blanditiis aspernatur minus quia laborum numquam ratione, neque temporibus tenetur debitis dolore est. Perspiciatis.</p>
            <section class="not-format">
                <div class="flex justify-between items-center mb-6 mt-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>
                </div>
                <form class="mb-6">
                    @csrf
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Post comment
                    </button>
                </form>
                <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">Michael Gough</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">Feb. 8, 2022</time></p>
                        </div>
                    </footer>
                    <p>Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                        instruments for the UX designers. The knowledge of the design tools are as important as the
                        creation of the design strategy.</p>
                </article>
            </section>
        </article>
    </div>
</x-layout>