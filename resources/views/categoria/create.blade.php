<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Agregar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="my-10 text-2xl font-bold text-center">Agregar Categoria</h1>

                    <div class="p-5 md:flex md:justify-center">
                        <livewire:agregar-categoria />

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>