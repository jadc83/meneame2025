<x-app-layout>
    <div class="flex bg-orange-300 w-8/12 mx-auto m-4 p-4 rounded-lg shadow-lg">
        <div class="flex justify-center items-center mb-6">
            @if ($noticia->imagen)
                <img class="w-32 h-20 object-cover rounded-lg" src="{{ asset('storage/' . $noticia->imagen) }}"
                    alt="Foto de noticia">
            @else
                <p class="text-gray-500">No hay foto disponible</p>
            @endif
        </div>

        <div class="flex flex-col justify-center ml-4">
            <h1 class="text-lg font-semibold">
                <a href="{{ $noticia->url }}" class="text-blue-600">{{ $noticia->titulo }}</a>
            </h1>
            <p class="text-sm text-gray-700">{{ $noticia->resumen }}</p>
            <p class="text-xs text-gray-600">Categoria: {{ $noticia->categoria->denominacion }}</p>
        </div>
    </div>

    <div class="flex-col w-8/12 bg-orange-300 mx-auto p-4 rounded-lg mb-6">
        @foreach ($noticia->comentarios as $comentario)
            <x-comentario :comentario="$comentario" />
        @endforeach
    </div>

</x-app-layout>
