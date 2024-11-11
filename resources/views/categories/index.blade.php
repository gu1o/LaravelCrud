{{-- page bases --}}
@extends('base')


@section('content')
    <div class="flex flex-col px-10">
        <h1 class="text-4xl font-sans m-10 font-semibold">Categories List</h1>

        <div class="m-10">
            <a class="font-normal cursor-pointer bg-blue-700 text-slate-100 px-3 py-3 rounded-md hover:text-blue-700 hover:bg-slate-100 hover:border-[1px] border-blue-700 ease-in-out duration-300"
                href="{{ route('categories.create') }}"> Create category</a>
        </div>

        <!-- Exibe uma mensagem se não houver categorias -->
        @if ($categories->isEmpty())
            <div class="bg-yellow-200 text-start font-normal text-base px-2 py-3 ml-10">
                Nenhuma categoria encontrada.
            </div>
        @else
            <!-- Listagem em formato de cards -->
            <div class="flex">
                @foreach ($categories as $category)
                    <div class="flex gap-3 m-10 justify-center">
                        <div
                            class="max-w-sm h-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex flex-col justify-center items-center p-10">
                                <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $category->name }}</h2>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ Str::limit($category->description, 100) ?? 'Sem descrição' }}
                                </p>
                                <div class="flex gap-4 py-3 items-center">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="dark:text-white">
                                        <img class="rounded-t-lg" src="{{ asset('images/icons/edit_icon.svg') }}" alt="" />
                                        </a>
                                        <a href="" class="dark:text-white">
                                        <img class="rounded-t-lg" src="{{ asset('images/icons/delete.svg') }}" alt="" />
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    @endif
@endsection
