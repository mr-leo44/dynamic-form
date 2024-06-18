<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Requisition N° {{ $demande->num_demande }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="max-h-auto mx-auto container">
                <div class="overflow-x-auto">
                    <div class="flex flex-col justify-start my-2">
                        <p class="font-semibold text-md">
                            Service demandé : {{ __('Marketing') }}
                            {{-- {{ $demande->user-> }} --}}
                        </p>
                        <p class="font-semibold text-md">Utilisateur : {{ $demande->user->name }}</p>
                        <p class="font-semibold text-md">Date : {{ $demande->created_at->format('d-m-Y') }}</p>
                    </div>
                    <table class="w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col"
                                    class="text-sm font-medium bg-orange-100 text-slate-900 px-6 py-4 text-left">
                                    N°
                                </th>
                                <th scope="col"
                                    class="text-sm font-medium bg-orange-100 text-slate-900 px-6 py-4 text-left">
                                    Designation
                                </th>
                                <th scope="col"
                                    class="text-sm font-medium bg-orange-100 text-slate-900 px-6 py-4 text-left">
                                    Qte demandée</th>
                                <th scope="col"
                                    class="text-sm font-medium bg-orange-100 text-slate-900 px-6 py-4 text-left">
                                    Qte Livrée</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demande->demande_details as $key => $value)
                                <tr class="bg-gray-100 border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        {{ $key + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        {{ $value->designation }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                        {{ $value->qte_demandee }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium first:mr-2 last:ml-2">
                                        {{ $value->qte_livree }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</x-app-layout>
