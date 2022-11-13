<div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 border dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase border bg-gray-50 dark:text-gray-40">
                <tr class="border">


                    <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                        Nombre Categoria
                    </th>

                    <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                        Agregado
                    </th>
                    <th scope="col" class="p-2 text-sm font-bold text-center text-black border">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria )
                <tr class="bg-white border-b">


                    <td class="text-base font-bold text-center text-gray-700 border">
                        {{$categoria->categoria}}
                    </td>
                    <td class="text-base font-bold text-center text-gray-700 border">
                        {{$categoria->created_at->diffForHumans()}}
                    </td>
                    <td class="text-center border">
                        <div class="flex flex-col justify-between gap-3 px-4 py-4">
                            <a wire:click="$emit('eliminar',{{$categoria->id}})"
                                class="px-4 py-2 text-sm font-bold text-center text-white uppercase bg-red-600 rounded-lg hover:bg-red-700">Eliminar</a>
                        </div>
                    </td>





                </tr>
                @empty

                @endforelse

            </tbody>

        </table>

    </div>

</div>



@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('eliminar', categoria_id => {
        Swal.fire({
        title: 'Deseas eliminar el proveedor?',
        text: "No podras volver a recuperar la informacion del proveedor!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar',
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('eliminarCategoria',categoria_id);
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