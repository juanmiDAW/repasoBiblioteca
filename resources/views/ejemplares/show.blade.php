<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver libro
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                ID del ejemplar
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $ejemplar->id }}
                            </dd>
                        </div>
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Nombre
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $ejemplar->libro->titulo }}
                            </dd>
                        </div>
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Autor
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $ejemplar->libro->autor }}
                            </dd>
                        </div>
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Estado prestamo
                            </dt>
                            @foreach ($ejemplar->prestamos as $prestamo)

                        {{$prestamo->created_at}}
                                @if ($prestamo->created_at < Carbon\Carbon::now()->subDays(30))
                                    <dd class="text-lg font-semibold text-red-600">
                                        Vencido
                                    </dd>
                                @else
                                    <dd class="text-lg font-semibold text-green-600">
                                        En fecha
                                    </dd>
                                @endif
                            @endforeach
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
