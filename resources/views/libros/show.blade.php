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
                                ID del libro
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $libro->id }}
                            </dd>
                        </div>
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Nombre
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $libro->titulo }}
                            </dd>
                        </div>
                    </dl>

                    <div>
                        <table>
                            <thead>
                                <th class="p-6">Ejemplar</th>
                                <th class="p-6">Estado</th>
                                <th class="p-6">Fecha de prestamo</th>
                            </thead>
                            <tbody>
                                @foreach ($libro->ejemplares as $ejemplar)
                                    <tr>
                                        <td class="p-6 text-center"><a href="{{route('ejemplares.show', $ejemplar->id)}}"> {{ $ejemplar->id }} </a></td>
                                        @if ($ejemplar->prestamos->isEmpty())
                                            <td class="p-6 text-center">Libre</td>
                                            <td class="p-6 text-center">-</td>
                                        @endif
                                        @foreach ($ejemplar->prestamos as $prestamo)
                                            @if ($prestamo->fecha_hora)
                                                <td class="p-6 text-center">Libre</td>
                                                <td class="p-6 text-center">-</td>
                                            @else
                                                <td class="p-6 text-center">Prestado</td>
                                                <td class="p-6 text-center">{{$prestamo->created_at}}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
