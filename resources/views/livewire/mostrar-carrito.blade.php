<div class="p-6 bg-white border-b border-gray-200">

    @if (count(Cart::getContent()))
    <table class="w-full text-sm text-left text-gray-500 border dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase border bg-gray-50 dark:text-gray-40">
            <tr class="border">
                <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                    Imagen
                </th>

                <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                    Nombre producto
                </th>

                <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                    Precio
                </th>
                <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                    cantidad
                </th>


                </th>
                <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach (Cart::getContent() as $item)
            <tr class="bg-white border-b">

                <td scope="row"
                    class="p-2 font-medium text-center text-gray-900 border w-28 whitespace-nowrap ">
                    <img src="{{asset('storage/imagenes-ajustadas/'. $item->attributes['img'])}}"
                        alt="">
                </td>
                <td class="text-base font-bold text-center text-gray-700 border">
                    {{$item->name}}

                </td>

                <td class="text-base font-bold text-center text-gray-700 border">
                    ${{$item->price}}
                </td>
                <td class="text-base font-bold text-center text-gray-700 border">
                    {{$item->quantity}}
                </td>

                <td class="p-2 text-base font-bold text-center text-gray-700 border">
                    <x-primary-button wire:click="eliminarDelCarrito({{ $item->id }})" 
                        class="py-3 bg-red-500 hover:bg-red-600">
                        Eliminar del Carrito
                    </x-primary-button>
                </td>

                @endforeach
        </tbody>
    </table>
    <div class="flex items-center justify-around gap-5 mt-5 ">
        <div>
        <x-primary-button wire:click="vaciarElCarrito" class="py-3 font-extrabold bg-black ">
            Vaciar el Carrito
        </x-primary-button>
        <a href="{{ route('pago.index') }}" class="px-2 py-3 text-sm font-semibold text-white bg-green-600 rounded hover:bg-green-700 ">
             Proceder a pagar
        </a>
    </div>
    
    <p class="px-5 py-3 font-bold text-black border border-green-100 rounded bg-emerald-500">Total ${{ Cart::getTotal() }}</p>
    </div>
    

    @else
    <p>Carrito vacio</p>
    @endif
</div>