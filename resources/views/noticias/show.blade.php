<x-app-layout>
    <div class="flex bg-indigo-600 w-8/12 mx-auto m-4 p-4 rounded-lg shadow-lg border-2 border-orange-600 border-full">
        <div class="flex justify-center items-center mb-6">
            @if ($noticia->imagen)
                <img class="w-32 h-20 object-cover rounded-lg" src="{{ asset('storage/' . $noticia->imagen) }}"
                    alt="Foto de noticia">
            @else
                <p class="text-gray-500">No hay foto disponible</p>
            @endif
        </div>


        <div class="flex flex-col justify-center ml-4">
            <h1 class="text-lg font-semibold text-white">
                <a href="{{ $noticia->url }}" class="text-white">{{ $noticia->titulo }}</a>
            </h1>
            <p class="text-sm text-white"><strong>Subida por: </strong>{{ $noticia->propietario->name }} <strong>Categoria:</strong>{{ $noticia->categoria->denominacion }}</p>
            <p class="text-xl text-white">{{ $noticia->resumen }}</p>

        </div>
        <div class="ml-24">
            <form method="POST" action="{{ route('comentarios.store', $noticia) }}">
                @csrf
                <input type="hidden" name="comentable_id" value="{{ $noticia->id }}">
                <input type="hidden" name="comentable_type" value="App\Models\Noticia">
                <textarea name="contenido" class="w-full p-2 border rounded" placeholder="Escribe tu respuesta..." required></textarea>
                <x-primary-button>Responder</x-primary-button>
            </form>
        </div>
    </div>



    <div class="flex-col w-8/12 bg-orange-300 mx-auto p-4 rounded-lg mb-6 border-2 border-indigo-600 border-full">
        @foreach ($noticia->comentarios as $comentario)
            <x-comentario :comentario="$comentario" />
        @endforeach
    </div>

</x-app-layout>
