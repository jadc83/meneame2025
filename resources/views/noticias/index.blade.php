<x-app-layout>
    @foreach ($noticias as $noticia)
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
                Categoria: {{ $noticia->categoria->denominacion }}
            </h1>
            <div class="mt-2">
                <form action="{{ route('noticias.edit', $noticia) }}" method="get">
                    @csrf
                    <x-primary-button class="text-2xl">Editar</x-primary-button>
                </form>
                <form action="{{ route('noticias.destroy', $noticia) }}" method="post">
                    @csrf
                    @method('delete')
                    <x-primary-button class="text-2xl">Borrar</x-primary-button>
                </form>
                <form action="{{ route('noticias.show', $noticia) }}" method="get">
                    @csrf
                    <x-primary-button class="text-2xl">Comentarios</x-primary-button>
                </form>
            </div>
        </div>
    @endforeach
</x-app-layout>
