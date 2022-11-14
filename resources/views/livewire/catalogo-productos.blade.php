
@forelse ($categorias as $categoria)
<div>
    <h1 class="px-10 mx-auto text-4xl font-extrabold leading-8 tracking-tight text-emerald-500">{{ $categoria->categoria }}</h1>
    <div class="grid grid-cols-1 gap-5 px-10 py-3 sm:grid-cols-1 md:grid-cols-4">

        @forelse ($productos as $producto)

        @if ($producto->categoria->categoria === $categoria->categoria)


        <!--Card 1-->
        <div class="overflow-hidden rounded shadow-lg">
            <img class="w-40 mx-auto" src="{{asset('storage/imagenes-ajustadas/'. $producto->img)}}" alt="Mountain">
            <div class="px-6 py-4">
                <div class="m-2 text-xl font-bold">{{ $producto->nombre }}</div>
                <p class="text-base text-gray-700">
                    {{ $producto->descripcion }}
                </p>
            </div>
                <div class="flex justify-center align-bottom">
                <x-primary-button class="object-bottom">Añadir al Carrito</x-primary-button>
               
            </div>
            
        </div>
        @endif
        

        @empty
        

        @endforelse
    </div>

</div>
@empty

    
@endforelse
