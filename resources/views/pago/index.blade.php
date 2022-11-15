<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Lista de categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session()->has('message'))

            <div class="p-2 my-3 font-bold text-green-600 uppercase bg-green-100 border border-green-600">

                {{ session('message') }}

            </div>

        @endif
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 bg-white border-b border-gray-200">
                    @livewire('añadir-pago')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
