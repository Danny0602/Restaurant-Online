<x-app-layout>
    <div class="py-16 overflow-hidden bg-gray-50 lg:py-24">
        <div class="max-w-xl px-4 mx-auto sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="relative">
                <h2 class="text-4xl font-extrabold leading-8 tracking-tight text-center text-indigo-600 sm:text-6xl">
                    Encuentra un producto y solicitalo de forma online</h2>

                    @if (session()->has('message'))
            <div class="p-2 my-3 font-bold text-green-600 uppercase bg-green-100 border border-green-600">

                {{ session('message') }}

            </div>
            @endif
            </div>

            @forelse ($categorias as $categoria)
            <div>
                <h1 class="px-10 mx-auto text-4xl font-extrabold leading-8 tracking-tight text-emerald-500">{{
                    $categoria->categoria }}</h1>

                @livewire('catalogo-productos', ['categoria' => $categoria->categoria])
            </div>
            @empty
            @endforelse
        </div>
    </div>
    </div>


</x-app-layout>