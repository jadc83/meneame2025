<x-app-layout>
    @foreach ($noticias as $noticia)
        <div class="flex  bg-orange-300 w-8/12 mx-auto m-4 p-4 rounded-xl">
            <div class="flex justify-center items-center mb-6">
                @if ($noticia->imagen)
                    <img class="w-32 h-20 object-cover rounded-lg" src="{{ asset('storage/' . $noticia->imagen) }}"alt="Foto de noticia">
                @else
                    <p class="text-gray-500">No hay foto disponible</p>
                @endif
            </div>
            <h1 class="flex">
                <div class="flex flex-col justify-center ml-4">
                    <h1 class="text-lg font-semibold">
                        <a href="{{ $noticia->url }}" class="text-blue-600">{{ $noticia->titulo }}</a>
                    </h1>
                    <p class="text-sm text-gray-700">
                            <strong>Subida por: </strong>{{ $noticia->propietario->name }}
                            <strong>Categoria:</strong>{{ $noticia->categoria->denominacion }}
                            <strong>Meneos:</strong>{{ $noticia->meneos->count() }}
                    </p>
                    <p class="text-xl text-gray-700">{{ $noticia->resumen }}</p>
                    <p class="text-xl text-gray-700"></p>
                </div>
            </h1>
            <div class="mt-2 flex">
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
                <form action="{{ route('noticias.menear', $noticia) }}" method="post">
                    @csrf
                    <x-primary-button class="text-2xl">Menear</x-primary-button>
                </form>
                <form action="{{ route('noticias.desmenear', $noticia) }}" method="GET">
                    @csrf
                    @method('DELETE')
                    <x-primary-button class="text-2xl">Desmenear</x-primary-button>
                </form>

            </div>
        </div>
    @endforeach
</x-app-layout>
