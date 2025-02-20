<div class="bg-orange-300 p-2 ml-4 rounded-lg mb-2 text-left" x-data="{ open: false }">
    <p class="bg-white p-4 rounded-lg shadow-sm mb-1">{{ $comentario->contenido }}</p>

    <x-primary-button @click="open = !open">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
          </svg>
    </x-primary-button>

    <div x-show="open" x-transition class="mt-2">
        <form method="POST" action="{{ route('comentarios.subcomentar') }}">
            @csrf
            <input type="hidden" name="comentable_id" value="{{ $comentario->id }}">
            <input type="hidden" name="comentable_type" value="App\Models\Comentario">
            <textarea name="contenido" class="w-full p-2 border rounded" placeholder="Escribe tu respuesta..." required></textarea>
            <x-primary-button>Responder</x-primary-button>
        </form>
    </div>

    @if ($comentario->comentarios->isNotEmpty())
        @foreach ($comentario->comentarios as $comentario)
            <x-comentario :comentario="$comentario" />
        @endforeach
    @endif
</div>
