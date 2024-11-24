{{-- page bases --}}
@extends('base')


@section('content')
    <div class="flex flex-col justify-start items-center m-10 gap-2">
        <h1 class="font-sans text-4xl">Hello There!</h1>
        <p class="font-sans text-base text-start">Here, you gonna explorer some stories about conflits about the Star Wars. Since the prequels, starting in before the Republic exists, until the sequels, where we met Rey and Kylo Ren.</p>
        <p class="font-sans text-base text-start">Use the bellow cards to navegate into the website or the navegate bar.</p>
    </div>

    <div class="flex gap-3 m-10 justify-center">
        <div class="max-w-sm h-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Categories</h2>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here, you can create new categories before create some product. You can also edit or delete categories already exist or the new ones that you've created.</p>
                <a href="{{ route('armies-involved.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    See more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Products</h2>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here, you can create new products, set the category's belong and edit or delete products created before.</p>
                <a href="{{ route('armies-involved.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    See more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

    </div>
@endsection
