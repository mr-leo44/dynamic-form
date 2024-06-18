<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div id="alert-3"
                    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="max-h-auto mx-auto container">
                <div class="relative sm:flex sm:justify-center sm:items-center selection:text-white">
                    <div class="max-w-7xl mx-auto p-6 lg:p-8">
                        <div class="flex justify-center font-semibold text-4xl">
                            <h1>
                                {{-- Liste des demandes --}}
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <div class="flex justify-end my-2">
                        <a href="{{ route('demandes.create') }}"
                            class="bg-orange-500 hover:bg-orange-500 p-3 text-white rounded-lg">
                            <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14m-7 7V5" />
                            </svg>
                        </a>
                    </div>
                    <table class="w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col"
                                    class="text-sm font-medium bg-orange-100 text-slate-900 px-6 py-4 text-left">
                                    N° Demande
                                </th>
                                <th scope="col"
                                    class="text-sm font-medium bg-orange-100 text-slate-900 px-6 py-4 text-left">
                                    Service
                                </th>
                                <th scope="col"
                                    class="text-sm font-medium bg-orange-100 text-slate-900 px-6 py-4 text-left">
                                    Utilisateur</th>
                                <th scope="col"
                                    class="text-sm font-medium bg-orange-100 text-slate-900 px-6 py-4 text-left">
                                    Date</th>
                                <th scope="col"
                                    class="text-sm font-medium bg-orange-100 text-slate-900 px-6 py-4 text-left">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $demande)
                                <tr class="bg-gray-100 border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        {{ $demande->num_demande }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        {{ __('Marketing') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        {{ $demande->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        {{ $demande->created_at->format('d-m-Y') }}</td>
                                    <td class="flex gap-3 px-6 py-4 whitespace-nowrap text-sm font-medium first:mr-2 last:ml-2">
                                        <a href="{{ route('demandes.show', $demande->id) }}"
                                            class="bg-orange-500 hover:bg-orange-500 p-2 text-white rounded">
                                            <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                              </svg>
                                              
                                        </a>
                                        <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-slate-700 hover:bg-slate-700 p-2 text-white rounded">
                                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M5 12h14" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $demandes->links() }}
            </div>
</x-app-layout>
