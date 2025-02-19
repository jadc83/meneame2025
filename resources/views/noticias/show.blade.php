<x-app-layout>
    <div class="flex  bg-orange-300 w-8/12 mx-auto m-4 p-4">
        <div class="flex justify-center items-center mb-6">
            @if ($noticia->imagen)
                <img class="w-32 h-20 object-cover rounded-lg" src="{{ asset('storage/' . $noticia->imagen) }}"alt="Foto de noticia">
            @else
                <p class="text-gray-500">No hay foto disponible</p>
            @endif
        </div>
        <h1 class="flex">
            <a href="{{ $noticia->url }}"> {{ $noticia->titulo }}</a> |
            {{ $noticia->resumen }} |
            Usuario: {{ $noticia->usuario->name}} |
            Categoria: {{ $noticia->categoria->denominacion }}
        </h1>

    </div>
</x-app-layout>
