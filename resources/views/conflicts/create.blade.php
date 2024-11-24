{{-- page bases --}}
@extends('base')


@section('content')
    <div class="container">
        <h1 class="my-4">Cadastrar Categoria</h1>
        <!-- Formulário de Cadastro -->


        <form action="{{ route('conflicts.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="name" id="name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Conflict
                        name</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="start_date" id="start_date"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="start_date"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Start
                        date conflict - 01/01/2000</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="end_date" id="end_date"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="end_date"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">End
                        date conflict - 01/01/2002</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <textarea type="text" name="description" id="description"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="">
                </textarea>
                <label for="description"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description
                    about conflict</label>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            <a href="{{ route('conflicts.index') }}"
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancel</a>
        </form>

    </div>
@endsection

@section('js')
<script>
    document.querySelectorAll('#start_date, #end_date').forEach(input => {
        input.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (value.length > 8) value = value.slice(0, 8); // Limita a 8 caracteres

            let formattedValue = '';
            if (value.length >= 5) {
                formattedValue = value.replace(/(\d{2})(\d{2})(\d+)/, '$1-$2-$3'); // Formata como DD-MM-YYYY
            } else if (value.length >= 3) {
                formattedValue = value.replace(/(\d{2})(\d+)/, '$1-$2'); // Formata como DD-MM
            } else {
                formattedValue = value; // Apenas os primeiros dígitos
            }

            this.value = formattedValue;
        });

        input.addEventListener('blur', function () {
            // Validações adicionais no campo quando perde o foco
            const dateRegex = /^(\d{2})-(\d{2})-(\d{4})$/;
            if (!dateRegex.test(this.value)) {
                alert('Por favor, insira uma data válida no formato DD-MM-YYYY.');
                this.value = ''; // Limpa o campo se for inválido
            } else {
                const [_, day, month, year] = this.value.match(dateRegex).map(Number);
                const isValidDate = (d, m, y) => {
                    const date = new Date(y, m - 1, d);
                    return date.getFullYear() === y && date.getMonth() === m - 1 && date.getDate() === d;
                };

                if (!isValidDate(day, month, year)) {
                    alert('Por favor, insira uma data válida.');
                    this.value = '';
                }
            }
        });
    });
</script>

@endsection
