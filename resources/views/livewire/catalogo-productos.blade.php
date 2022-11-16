<div>

    <div class="grid grid-cols-1 gap-5 px-10 py-3 sm:grid-cols-1 md:grid-cols-4">

        @forelse ($productos as $producto)

        @if ($producto->categoria->categoria === $categoria)




        <!--Card 1-->
        <div class="flex flex-col overflow-hidden rounded shadow-lg">
            <img class="flex-1 w-40 mx-auto" src="{{asset('storage/imagenes-ajustadas/'. $producto->img)}}"
                alt="Mountain">
            <div class="px-6 py-4">
                <div class="flex-1 m-2 text-xl font-bold">{{ $producto->nombre }}</div>
                <p class="text-base text-gray-700">
                    {{ $producto->descripcion }}
                </p>
            </div>
            <div class="flex justify-center mb-4 align-bottom">
                <x-primary-button wire:click="{{ $producto->disponibilidad == 0 ? 'error' : 'agregarProductoCarrito({!! $producto->id!!}) ' }}" 
                     class="object-bottom {{ $producto->disponibilidad == 0 ? 'bg-red-600 hover:bg-red-700' :
                    'bg-lime-600 hover:bg-lime-700' }}">
                     {{ $producto->disponibilidad == 0 ? 'No hay en existencias' : 'Añadir al carrito' }}</x-primary-button>

            </div>

        </div>
        @endif



        @empty


        @endforelse
    </div>

</div>