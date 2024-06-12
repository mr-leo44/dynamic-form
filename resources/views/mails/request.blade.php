@props(['destinataire_name'])

<x-guest-layout>
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
    <span class="text-md font-semibold text-center">Salut, {{ $destinataire_name }}, Vous avez une demande de requisition en cours.</span>
    <a class="ms-3" href="{{ route('demandes.index') }}">
        {{ __('Voir la demande') }}
    </a>
</x-guest-layout>
