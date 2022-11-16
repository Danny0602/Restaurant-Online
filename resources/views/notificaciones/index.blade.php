@php
     $precioFinal = 0
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white ">

                    <h1 class="my-10 text-2xl font-bold text-center">Mis Notificaciones</h1>

                    <div class="divide-y divide-gray-200">
                        @forelse ($notificaciones as $notificacion)

                        <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                            <div class="">
                                <p>Tienes un nuevo pedido hecho por: <span
                                        class="font-bold">{{$notificacion->data["user_name"]}}</span></p>
                                
                                
                                @foreach ($notificacion->data['data'] as $item)
                                    
                                    <p>El cliente quiere -  <span
                                        class="font-bold">{{ $item['quantity'] .' - '. $item['name']}}</span></p>
                                   @php
                                       
                                        $precioFinal = +$item['price']
                                    
                                   @endphp
                                @endforeach

                                <p>Total: <span class="font-bold">${{$precioFinal}}</span>
                                <p>Hace: <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                {{-- <a class="p-3 text-sm font-bold text-white uppercase bg-indigo-600"
                                    href="{{route('candidatos.index',$notificacion->data['vacante_id']) }}">Ver
                                    Candidatos </a>--}}
                            </div>
                        </div>


                        @empty
                        <p class="text-center text-gray-600">No hay notificaciones nuevas </p>
                        @endforelse




                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>