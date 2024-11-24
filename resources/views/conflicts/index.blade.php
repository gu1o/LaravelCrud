{{-- page bases --}}
@extends('base')


@section('content')
    <main class="m-10">
        <div class="flex flex-col justify-normal mb-6">
            <h2 class="text-4xl font-extrabold">Conflicts - Star Wars Galaxy</h2>
            <p class="my-4 text-lg text-gray-500">Every conflict about the galaxy is register here. You can see about every
                one
                in our cards bellow. Every conflicts added before using the same image to represent the battle as a default
                image.</p>
            <p class="my-4 text-lg text-gray-500"">If you notice that missing some conflict you remember, please register
                this one for us.</p>

            <a href="{{ route('conflicts.create') }}"
                class="flex items-center w-[220px] px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Register a new conflict
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
        <div class="flex items-center gap-2">
            <!--mostra uma mensagem se nao tiver nada -->
            @if ($conflicts->isEmpty())
                <div id="alert-border-4"
                    class="flex items-center p-4 mb-4 text-yellow-700 border-t-4 border-yellow-200 bg-yellow-50"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        None conflict registered. Do you know about some conflict? Register a new one!
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-4" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @else
                @foreach ($conflicts as $conflict)
                    <div id="conflict-card-{{ $conflict->id }}"
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <img class="rounded-t-lg" src="{{ asset('images/conflicts.jpg') }}" alt="" />
                        <div class="p-5">
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $conflict->name }}</h2>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ Str::limit($conflict->description, 100) ?? 'Sem descrição' }}
                            </p>

                            <div class="flex items-center justify-between">
                                <a href="{{ route('conflicts.edit', $conflict->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Edit conflict
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>

                                <a href="#" onclick="openDeleteModal(event, {{ $conflict->id }})"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Delete conflict
                                    <img class="w-5 h-5 ml-2" src="{{ asset('images/icons/delete.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>


        {{-- MODAL DE EXCLUSAO --}}
        <div id="popup-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full left-1/2 translate-x-[-50%]">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" id="close-delete"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            delete this conflict?</h3>
                        <button id="confirm-delete" data-modal-hide="popup-modal" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button id="cancel-delete" data-modal-hide="popup-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- FIM MODAL DE EXCLUSAO --}}

    </main>
@endsection


@section('js')
    {{-- botao de fechar alerta de nenhum item adicionado --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // seleciona o botão de fechar e o alerta
            const closeButton = document.querySelector('[data-dismiss-target="#alert-border-4"]');
            const alert = document.getElementById('alert-border-4');

            if (closeButton && alert) {
                closeButton.addEventListener('click', () => {
                    alert.classList.add('transition-opacity', 'opacity-0');

                    setTimeout(() => {
                        alert.remove();
                        console.log('O alerta foi removido.');
                    }, 1000);
                });
            }
        });
    </script>

    {{-- script do modal de delete --}}
    <script>
        let conflictIdToDelete = null;

        function openDeleteModal(event, conflictId) {
            event.preventDefault();
            conflictIdToDelete = conflictId;
            document.getElementById('popup-modal').classList.remove('hidden');
        }

        function deleteConflict(conflictId) {
            fetch(`/conflicts/${conflictId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // remove o card
                        document.getElementById(`conflict-card-${conflictId}`).remove();

                        // styles do alerta de exclusao
                        const alertContainer = document.createElement('div');
                        alertContainer.className =
                            'absolute top-1/2 left-1/2 translate-x-[-50%] p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400';
                        alertContainer.setAttribute('role', 'alert');
                        alertContainer.innerHTML = `
                    <span class="font-medium">Success alert!</span> Conflict was deleted successfully.
                `;

                        // insere o alerta dentro da main
                        const mainContent = document.querySelector('main');
                        mainContent.prepend(alertContainer);

                        // remove o alerta automatico
                        setTimeout(() => alertContainer.remove(), 5000);
                    } else {
                        alert('Failed to delete conflict.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });

            // esconde o modal
            document.getElementById('popup-modal').classList.add('hidden');
        }

        // eventos para os botões de confirmar, cancelar e fechar
        document.getElementById('confirm-delete').addEventListener('click', () => {
            if (conflictIdToDelete) {
                deleteConflict(conflictIdToDelete);
            }
        });

        document.getElementById('cancel-delete').addEventListener('click', () => {
            conflictIdToDelete = null;
            document.getElementById('popup-modal').classList.add('hidden');
        });

        document.getElementById('close-delete').addEventListener('click', () => {
            conflictIdToDelete = null;
            document.getElementById('popup-modal').classList.add('hidden');
        });
    </script>
@endsection
