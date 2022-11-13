

    <form wire:submit.prevent="submit" class="space-y-5 md:w-1/2" novalidate>


        <div>
            <x-input-label for="nombre" :value="__('Nombre Categoria')" />

            <x-text-input wire:model='nombre' id="nombre" class="block w-full mt-1" type="text"
                :value="old('nombre')" />

            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        

        

        

        
       
        <div>
            <x-primary-button class="justify-center w-full py-3 text-base font-black bg-emerald-600 hover:text-black hover:bg-emerald-700">
                Agregar Categoria
            </x-primary-button>
        </div>
    </form>



