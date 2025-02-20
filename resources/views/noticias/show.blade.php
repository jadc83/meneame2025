<x-app-layout>
    <!-- Contenedor principal de la noticia -->
    <div class="flex bg-orange-300 w-8/12 mx-auto m-4 p-4 rounded-lg shadow-lg">
        <!-- Imagen de la noticia -->
        <div class="flex justify-center items-center mb-6">
            @if ($noticia->imagen)
                <img class="w-32 h-20 object-cover rounded-lg" src="{{ asset('storage/' . $noticia->imagen) }}" alt="Foto de noticia">
            @else
                <p class="text-gray-500">No hay foto disponible</p>
            @endif
        </div>

        <!-- Título, resumen y categoría de la noticia -->
        <div class="flex flex-col justify-center ml-4">
            <h1 class="text-lg font-semibold">
                <a href="{{ $noticia->url }}" class="text-blue-600">{{ $noticia->titulo }}</a>
            </h1>
            <p class="text-sm text-gray-700">{{ $noticia->resumen }}</p>
            <p class="text-xs text-gray-600">Categoria: {{ $noticia->categoria->denominacion }}</p>
        </div>
    </div>

    <div class="flex-col w-8/12 bg-indigo-500 mx-auto p-4 rounded-lg mb-6">
        @foreach ($noticia->comentarios as $comentario)
            <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                <p class="text-sm font-medium">{{ $comentario->contenido }}</p>
                @foreach ($comentario->subcomentarios as $subcomentario)
                    <div class="bg-pink-600 text-white p-2 rounded-lg mt-2 ml-8">
                        <p class="text-sm">{{ $subcomentario->contenido }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-app-layout>
