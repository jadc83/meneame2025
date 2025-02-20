<div class="bg-white p-4 rounded-lg shadow-md mb-4">
    <p class="text-sm font-medium">{{ $comentario->contenido }}</p>

    @if ($comentario->comentarios->isNotEmpty())
        <div class="ml-8 mt-2">
            @foreach ($comentario->comentarios as $comentario)
                <x-comentario :comentario="$comentario" />
            @endforeach
        </div>
    @endif
</div>
