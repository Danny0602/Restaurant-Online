<form wire:submit.prevent="submit" class="space-y-5 md:w-1/2" novalidate>


    <div>
        <x-input-label for="nombre" :value="__('Nombre Completo')" />

        <x-text-input wire:model='nombre' id="nombre" class="block w-full mt-1" type="text" :value="old('nombre')" />

        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="tarjeta" :value="__('Numero de Tarjeta')" />

        <x-text-input wire:model='tarjeta' id="tarjeta" class="block w-full mt-1" type="number"
            :value="old('tarjeta')" />

        <x-input-error :messages="$errors->get('tarjeta')" class="mt-2" />
    </div>
    <div class="flex gap-5">
        <div>
            <x-input-label for="dia" :value="__('Dia')" />

            <select
                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                wire:model="dia" id="dia">
                <option value="">-- Seleccione --</option>

                @for ($i = 0; $i <= 30; $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor

            </select>
            <x-input-error :messages="$errors->get('dia')" class="mt-2" />

        </div>
        <div>
        <x-input-label class="" for="mes" :value="__('Mes')" />


        <select
            class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            wire:model="mes" id="mes">
            <option value="">-- Seleccione --</option>

            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agost</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>

        <x-input-error :messages="$errors->get('mes')" class="mt-2" />
        </div>
    </div>

    <div>
        <x-input-label for="cvv" :value="__('Numero de Cvv')" />

        <x-text-input wire:model='cvv' id="cvv" class="block w-full mt-1" type="password" :value="old('cvv')" />

        <x-input-error :messages="$errors->get('cvv')" class="mt-2" />
    </div>









    <div>
        <x-primary-button
            class="justify-center w-full py-3 text-base font-black bg-emerald-600 hover:text-black hover:bg-emerald-700">
            Agregar Categoria
        </x-primary-button>
    </div>
</form>