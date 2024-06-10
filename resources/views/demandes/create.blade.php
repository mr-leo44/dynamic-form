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
                                    <h1>Create an item</h1>
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
                    <div class="flex justify-end input-group-append">
                        <x-primary-button class="add-input text-sm">
                            {{ __('Ajouter') }}
                        </x-primary-button>
                    </div>
                    <form class="w-full" action="{{ route('demandes.store') }}" method="POST">
                        @csrf
                        <div id="input-container">
                            <div class="grid gap-3 mb-6 md:grid-cols-2 input-group">
                                <div>
                                    <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="designation" :value="__('Designation')" />
                                    <x-text-input id="designation"
                                        class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" name="demande[0]['designation']" :value="old('designation')"
                                        placeholder="Ex. Rame papier duplicataire" required autofocus
                                        autocomplete="designation" />
                                    <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="qte_demandee" :value="__('Quantité')" />
                                    <x-text-input id="qte_demandee"
                                        class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="number" name="demande[0]['qte_demandee']" :value="old('qte_demandee')" required
                                        autofocus autocomplete="qte_demandee" />
                                    <x-input-error :messages="$errors->get('qte_demandee')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-start mb-4">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
