<div class="bg-white p-4 rounded-lg shadow-md mb-4">

    <!-- Renderizar subcomentarios recursivamente -->
    @if ($comentario->subcomentarios->isNotEmpty())
        <div class="ml-8 border-l-2 border-gray-300 pl-4 mt-2">
            @foreach ($comentario->subcomentarios as $subcomentario)
                <x-comentarios :comentario="$subcomentario" />
            @endforeach
        </div>
    @endif
</div>
