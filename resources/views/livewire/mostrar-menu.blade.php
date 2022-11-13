<div>


    <div class="relative overflow-x-auto">
        @if (session()->has('message-mas'))
        <div class="px-2 font-bold bg-green-400 rounded-lg">
            {{ session('message-mas') }}
        </div>
        @elseif (session()->has('message-menos'))
        <div class="px-2 font-bold bg-red-400 rounded-lg">
            {{ session('message-menos') }}
        </div>

        @endif
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
                        Descripción
                    </th>
                    <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                        Precio
                    </th>
                    <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                        Categoria
                    </th>
                    
                    
                    </th>
                    <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto )
                <tr class="bg-white border-b">

                    <td scope="row" class="p-2 font-medium text-center text-gray-900 border w-28 whitespace-nowrap ">
                        <img src="{{asset('storage/menu/'. $producto->img)}}" alt="">
                    </td>
                    <td class="text-base font-bold text-center text-gray-700 border">
                        {{$producto->nombre}}
                    </td>
                    
                    <td class="text-base font-bold text-center text-gray-700 border">
                        {{$producto->descripcion}}
                    </td>
                    </td>
                    <td class="text-base font-bold text-center text-gray-700 border">
                        ${{$producto->precio}}
                    </td>
                    </td>
                    
                    </td>
                    <td class="text-base font-bold text-center text-gray-700 border">
                        {{$producto->categoria->categoria}}
                    </td>
                    <td class="text-center border">
                        <div class="flex flex-col justify-between gap-3 px-4 mt-1 mb-1">
                            <x-primary-button wire:click='disponible({{$producto->id}} )' class="justify-center px-4 py-2 {{ $producto->disponibilidad ? 'bg-green-600 hover:bg-green-700' : 'bg-indigo-600'  }}"> {{ $producto->disponibilidad ? 'Disponible' : 'No Disponible'  }}</x-primary-button>
                            <a href="{{ route('productos.edit',$producto->nombre) }}"
                                class="px-4 py-2 text-sm font-bold text-center text-white uppercase rounded-lg bg-emerald-600 hover:bg-emerald-700">Editar</a>

                            <a wire:click="$emit('eliminar',{{$producto->id}})"
                                class="px-4 py-2 text-sm font-bold text-center text-white uppercase bg-red-600 rounded-lg hover:bg-red-700">Eliminar</a>
                        </div>
                    </td>

                </tr>


                @empty

                @endforelse

            </tbody>
        </table>

        {{-- <div class="my-5">
            {{$productos->links()}}
        </div> --}}
    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('eliminar', productoId => {
            Swal.fire({
            title: 'Deseas eliminar este producto del inventario?',
            text: "No podras volver a recuperar la informacion del producto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarMenu',productoId);
                Swal.fire(
                'Eliminado!',
                'Se ha borrado de forma permanente',
                'success'
                )
            }
            })
        })
        
    </script>

    @endpush

</div>