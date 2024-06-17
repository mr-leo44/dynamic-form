<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-h-auto mx-auto max-w-3xl">
                    <div class="relative sm:flex sm:justify-center sm:items-center selection:text-white">
                        <div class="max-w-7xl mx-auto p-6 lg:p-8">
                            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                                <div class="flex justify-center font-semibold text-4xl">
                                    <h1>Initier une demande</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="bg-red-500 text-white px-3 py-2 rounded-lg mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- <div class="flex justify-end input-group-append">
                        <x-primary-button class="add-input text-sm">
                            {{ __('Ajouter') }}
                        </x-primary-button>
                    </div> --}}
                    <form class="w-full" action="{{ route('demandes.store') }}" method="POST">
                        @csrf
                        <div id="input-container">
                            <div class="grid gap-4 mb-6 md:grid-cols-6">
                                <div class="col-span-5">
                                    <div class="grid gap-32 grid-cols-3">
                                        <div class="col-span-2">
                                            <x-input-label
                                                class="flex-start font-bold block mb-2 text-sm text-gray-900 dark:text-white"
                                                for="designation" :value="__('Designation')" />
                                        </div>
                                        <div class="">
                                            <x-input-label
                                                class="flex-start font-bold block mb-2 text-sm text-gray-900 dark:text-white"
                                                for="qte_demandee" :value="__('Quantité')" />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button"
                                        class="add-input text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-md p-2.5 text-center inline-flex items-center me-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                                        <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14m-7 7V5" />
                                        </svg>
                                        <span class="sr-only">Icon description</span>
                                    </button>
                                </div>
                            </div>
                            <div class="grid gap-4 mb-6 md:grid-cols-6 input-group">
                                <div class="col-span-5">
                                    <div class="flex justify-between gap-3">
                                        <x-text-input id="designation"
                                            class="bg-gray-50 w-[80%] border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            type="text" name="demandes[0][designation]" :value="old('designation')"
                                            placeholder="Ex. Rame papier duplicataire" required autofocus
                                            autocomplete="designation" />
                                        <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                        <x-text-input id="qte_demandee"
                                            class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-[20%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            type="number" name="demandes[0][qte_demandee]" :value="old('qte_demandee')" required
                                            autofocus autocomplete="qte_demandee" />
                                        <x-input-error :messages="$errors->get('qte_demandese')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="mt-auto">
                                    <button type="button"
                                        class="delete-input text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-md p-2.5 text-center inline-flex items-center me-2 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                        <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14" />
                                        </svg>

                                        <span class="sr-only">Icon description</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="flex justify-start mb-4">
                            <button type="submit"
                                class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var i = 0;
            $('.add-input').click(function(e) {
                e.preventDefault();
                i++;
                $('#input-container').append(`
                    <div class="grid gap-4 mb-6 md:grid-cols-6 input-group">
                        <div class="col-span-5">
                            <div class="flex justify-between gap-3">
                                <x-text-input id="designation"
                                    class="bg-gray-50 w-[80%] border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                    type="text" name="demandes[0][designation]" :value="old('designation')"
                                    placeholder="Ex. Rame papier duplicataire" required autofocus
                                    autocomplete="designation" />
                                <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                <x-text-input id="qte_demandee"
                                    class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-[20%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                    type="number" name="demandes[0][qte_demandee]" :value="old('qte_demandee')" required
                                    autofocus autocomplete="qte_demandee" />
                                <x-input-error :messages="$errors->get('qte_demandese')" class="mt-2" />
                            </div>
                        </div>
                            <div class="mt-auto">
                                <button type="button"
                                    class="delete-input text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-md p-2.5 text-center inline-flex items-center me-2 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                    <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14" />
                                    </svg>

                                    <span class="sr-only">Icon description</span>
                                </button>
                            </div>

                        </div>
                `);
            });
            // Ajout de la fonction de suppression
            $(document).on('click', '.delete-input', function(e) {
                e.preventDefault();
                const inputGroups = $('.input-group');
                if (inputGroups.length === 1) {
                    $('#designation').val('');
                    $('#qte_demandee').val('');
                } else {
                    $(this).closest('.input-group').remove();
                }
            });
        });
    </script>

</x-app-layout>
