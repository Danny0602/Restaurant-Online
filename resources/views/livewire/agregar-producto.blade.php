<form wire:submit.prevent="submit" class="space-y-5 md:w-1/2" novalidate>


        <div>
            <x-input-label for="nombre" :value="__('Nombre Producto')" />

            <x-text-input wire:model='nombre' id="nombre" class="block w-full mt-1" type="text"
                :value="old('nombre')" />

            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="descripcion" :value="__('Descripcion')" />

            <textarea wire:model='descripcion' id="descripcion" class="block w-full " type="text"
                :value="old('descripcion')" ></textarea>

            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Categoria" :value="__('Categoria')" />

            <select
                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                wire:model="categoria" id="Categoria">
                <option value="">-- Seleccione --</option>
                @foreach ($categorias as $categoria)
     
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>

                @endforeach
            </select>

            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        

        <div>
            <x-input-label for="precio" :value="__('Precio')" />

            <x-text-input id="precio" class="block w-full mt-1" type="text" wire:model="precio"
                :value="old('precio')" />

            <x-input-error :messages="$errors->get('precio')" class="mt-2" />
        </div>

        
        
       

        

        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />

            <x-text-input accept="image/*" id="imagen" class="block w-full mt-1" type="file" 
            wire:model="imagen" />

            <div class="my-5 w-80">
                @if ($imagen)
                Imagen:
                <img src="{{$imagen->temporaryUrl()}}" alt="imagen temporal de subida">
                    
                @endif
            </div>
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="justify-center w-full py-3 text-base font-black bg-emerald-600 hover:text-black hover:bg-emerald-700">Agregar producto</x-primary-button>
        </div>
    </form>

